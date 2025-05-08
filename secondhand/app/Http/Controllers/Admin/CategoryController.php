<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        // Lấy tất cả các danh mục
        $categories = category::paginate(5); // 12 là số lượng mục trên mỗi trang
    
        // Truyền biến categories vào view
        return view('Admin.category.categories', compact('categories'));
    }
    public function addCategories(){
        return view('Admin.category.add');
    }
    public function store(StoreCategoryRequest $request)
    {
        try {
            $filename = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
            }

            $categoryData = [
                'name' => $request->input('name'),
                'describe' => $request->input('describe'),
                'images' => $filename, 
            ];
    
        
            Category::create($categoryData);
    
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
        
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }
    public function edit(Category $category){
        $categories=category::all();
      return view('Admin.category.edit',compact('category','categories'));
    }
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $filename = $category->images; 
    
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
    
                if ($category->images && file_exists(public_path('assets/images/' . $category->images))) {
                    unlink(public_path('assets/images/' . $category->images));
                }
            }
            $category->update([
                'name' => $request->input('name'),
                'describe' => $request->input('describe'),
                'images' => $filename,
            ]);
            Alert::success('
            Update Success','Click to continue');
    
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            DB::table('product')->where('categories_id', $category->id)->delete();
            $category->delete();
    
            DB::commit();
            Alert::success('
            Delete Success','Click to continue');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'An error occurred while deleting the category');
        }
    }
    
    public function search(Request $request)
    {
        // Lấy truy vấn tìm kiếm
        $query = $request->input('query');
        
        // Tìm kiếm danh mục sản phẩm dựa trên truy vấn
        $filteredProducts = category::where('name', 'like', "%$query%")->paginate(12);
    
        // Đặt tham số truy vấn cho phân trang của danh mục đã lọc
        $filteredProducts->appends(['query' => $query]);
        $categories = $filteredProducts;
    
        // Truyền biến filteredProducts và query vào view
        return view('Admin.category.categories', compact('categories', 'query'));
    }
    
public function suggestions(Request $request)
{
    $data = $request->all();

    if ($data['query']) {
        $suggestions = category::where('name', 'like', '%' . $data['query'] . '%')
         
            ->take(5)
            ->get();

        $output = '<ul class="dropdown-menu" style="display:block;position:relative;">';
        foreach ($suggestions as $key => $val) {
            $output .= '<li class="li_search_ajax"><a href="#">' . $val->name . '</a></li>';
        }
        $output .= '</ul>';

        return response()->json(['html' => $output]);
    }
}



    
    
}