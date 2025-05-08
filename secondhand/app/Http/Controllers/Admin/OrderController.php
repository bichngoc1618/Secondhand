<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order;
use App\Models\order_detail;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
            {
                
                $order = order::paginate(15); 
            
              
                return view('Admin.cart.index', compact('order'));
            }
            public function updateOrderStatus($orderId, Request $request)
          {
            $order = order::findOrFail($orderId);
            $order->update(['status' => $request->input('status')]);

            return redirect()->back()->with('success', 'Order status updated successfully');
           }
           public function edit(string $id)
          {
            $order = order::with('order_detail.product')->find($id);
           
           

           return view('Admin.cart.detail', compact('order'));

          }
          public function deleteOrder(Order $order)
          {
              
              try {
                 
                  order_detail::where('order_id', $order->id)->delete();
                  $order->delete();
                  Alert::success('
                  Delete Success','Click to continue');
                  return redirect()->route('admin.orders.index');
              } catch (\Exception $e) {
                  return redirect()->back();
              }
          }
          public function search(Request $request)
          {
            
              $query = $request->input('query');
              
              // Tìm kiếm danh mục sản phẩm dựa trên truy vấn
              $filteredProducts = order::where('email', 'like', "%$query%")->paginate(12);
          
              // Đặt tham số truy vấn cho phân trang của danh mục đã lọc
              $filteredProducts->appends(['query' => $query]);
              $order = $filteredProducts;
          
              // Truyền biến filteredProducts và query vào view
              return view('Admin.cart.index', compact('order', 'query'));
          }
          
      public function suggestions(Request $request)
      {
          $data = $request->all();
      
          if ($data['query']) {
              $suggestions = order::where('email', 'like', '%' . $data['query'] . '%')
               
                  ->take(5)
                  ->get();
      
              $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-transform: unset !important;">';
              foreach ($suggestions as $key => $val) {
                  $output .= '<li class="li_search_ajax"><a href="#">' . $val->email . '</a></li>';
              }
              $output .= '</ul>';
      
              return response()->json(['html' => $output]);
          }
      }          
  
}
