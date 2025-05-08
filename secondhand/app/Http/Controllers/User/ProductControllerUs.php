<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\cooperation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\cart;
use App\Models\reviews;

class ProductControllerUs extends Controller
{
public function product($categoryId = null)
{
    $categories = Category::all();
    $productQuery = Product::with('category');

    if ($categoryId) {
        $productQuery = $productQuery->where('categories_id', $categoryId);
    }

    $product = $productQuery->paginate(12);
    

    return view('User.product', compact('product', 'categories'));
}

public function search(Request $request, $categoryId = null)
{
    $categories = category::all();
    $product = Product::with('category');

    if ($categoryId) {
        $products = $product->where('categories_id', $categoryId);
    }

    $product = $product->paginate(12);

    $query = $request->input('query');

    $filteredProducts = Product::where('title', 'like', "%$query%")
        ->orWhereHas('category', function ($q) use ($query) {
            $q->where('name', 'like', "%$query%");
        })
        ->paginate(12);

    // Merge the results if both category and title filters are applied
    if ($categoryId && $query) {
        $product = $products->merge($filteredProducts);
    } else {
        $product = $filteredProducts;
    }

    // Thêm giá trị tham số truy vấn vào liên kết phân trang
    $product->appends(['query' => $query]);

    $searchResultsFound = $product->isNotEmpty();

    // Trả về view với dữ liệu sản phẩm
    return view('User.product', compact('product', 'categories', 'searchResultsFound', 'query'));
}
public function suggestions(Request $request)
{
    $data = $request->all();

    if ($data['query']) {
        $suggestions = Product::where('title', 'like', '%' . $data['query'] . '%')
            ->orWhereHas('category', function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['query'] . '%');
            })->take(10)
            ->get();

        $output = '<ul class="dropdown-menu" style="display:block;position:relative; margin-left:-4rem">';
        foreach ($suggestions as $key => $val) {
            $output .= '<li class="li_search_ajax"><a href="#">' . $val->title . '</a></li>';
        }
        $output .= '</ul>';

        return response()->json(['html' => $output]);
    }
}


}