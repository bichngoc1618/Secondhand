<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\User;
use App\Models\cart;
use App\Models\order;
use App\Models\order_detail;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(){
        $cart = cart::with('product')->get();
        return view('User.checkout', compact('cart'));
       }
       public function store(Request $request)
       {
           try {
               // Tạo đơn hàng
               $order = Order::create([
                   'user_id' => Auth::user()->id,
                   'username' => Auth::user()->name,
                   'first_name' => $request->input('first_name'),
                   'last_name' => $request->input('last_name'),
                   'email' => $request->input('email'),
                   'address' => $request->input('address'),
                   'city' => $request->input('city'),
                   'phone' => $request->input('phone'),
                   'total_money' => $request->input('total'),
               ]);
       
               // Lấy order_id từ đơn hàng vừa tạo
               $order_id = $order->id;
       
               // Tạo danh sách chi tiết đơn hàng
               $orderdetail = [];
               if (is_array($request->product_id)) {
                   foreach ($request->product_id as $key => $productId) {
                    $product = Product::find($productId);
                    $orderdetail[] = [
                        'order_id' => $order_id,
                        'product_id' => $productId,
                        'product_name' => $product->title,
                        'price' => $request->price[$key],
                        'quantity' => $request->quantity[$key],
                       ];
                   }
                  
               } else {
                   // Xử lý trường hợp $request->product_id không phải là mảng
                   dd($request->product_id);
               }
       
              
               $user_id = Auth::user()->id;
               $productIds = $request->product_id;
             
       
               Cart::where('user_id', $user_id)
                   ->whereIn('product_id', $productIds)
                   ->delete();
       
               
               order_detail::insert($orderdetail);
               Mail::send('User.email', compact('orderdetail'), function ($email) {
                $email->subject('ReEarth-Order Success')
                    ->to(Auth::user()->email);
            });
            
       
               Alert::success('
               Order Success','Thank you for purchasing our products');
               return redirect()->route('User.home');
           } catch (\Throwable $th) {
               dd($th->getMessage());
               return redirect()->back()->with('error', 'Please enter again!');
           }
       }
       
    }       