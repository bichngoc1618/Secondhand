<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserControllerAdm extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10); 
        return view('Admin.user.index', compact('user'));
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
     
        $query = $request->input('query');
        
        // Tìm kiếm danh mục sản phẩm dựa trên truy vấn
        $filteredProducts = User::where('email', 'like', "%$query%")->paginate(12);
    
        // Đặt tham số truy vấn cho phân trang của danh mục đã lọc
        $filteredProducts->appends(['query' => $query]);
        $user = $filteredProducts;
    
        // Truyền biến filteredProducts và query vào view
        return view('Admin.user.index', compact('user', 'query'));
    }
    
public function suggestions(Request $request)
{
    $data = $request->all();

    if ($data['query']) {
        $suggestions = User::where('email', 'like', '%' . $data['query'] . '%')
         
            ->take(5)
            ->get();

        $output = '<ul class="dropdown-menu" style="display:block;position:relative;">';
        foreach ($suggestions as $key => $val) {
            $output .= '<li class="li_search_ajax"><a href="#">' . $val->email . '</a></li>';
        }
        $output .= '</ul>';

        return response()->json(['html' => $output]);
    }
}


}
