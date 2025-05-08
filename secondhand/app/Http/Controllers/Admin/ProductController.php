<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->paginate(12);
        

        return view('Admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all(); // Assuming your model is named Category
        $product = new Product(); // Assuming your model is named Product
    
        return view('Admin.product.add', compact('category', 'product'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct $request)
    {
        try {
            $filename = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
            }

            $productData = [
                'title' => $request->input('title'),
                'categories_id' => $request->input('categories_id'),
                'price'=>$request->input('price'),
                'status'=>$request->input('status'),
                'sale'=>$request->input('sale'),
                'thumbnail' => $filename,
                'description' =>$request->input('describe')
            ];
    
         
            product::create($productData);
           
    
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
           
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('category')->find($id); // hoặc findOrFail($id) nếu muốn xử lý khi không tìm thấy sản phẩm
$category = Category::all();

return view('Admin.product.edit', compact('product', 'category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $filename = $product->thumbnail; 
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
            }
    
           
    
            $productData = [
                'title' => $request->input('title'),
                'categories_id' => $request->input('categories_id'),
                'price' => $request->input('price'),
                'status' => $request->input('status'),
                'sale' => $request->input('sale'),
                'thumbnail' => $filename,
                'description' => $request->input('describe')
            ];
    
            $product->update($productData); 
           
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to delete product. Please try again!');
        }
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
        return view('Admin.product.index', compact('product', 'categories', 'searchResultsFound', 'query'));
    }
    public function suggestions(Request $request)
    {
        $data = $request->all();
    
        if ($data['query']) {
            $suggestions = Product::where('title', 'like', '%' . $data['query'] . '%')
                ->orWhereHas('category', function ($query) use ($data) {
                    $query->where('name', 'like', '%' . $data['query'] . '%');
                })->take(5)
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