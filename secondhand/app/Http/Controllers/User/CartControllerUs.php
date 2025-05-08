<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartControllerUs extends Controller
{
    public static function countCart(){
        return cart::where('user_id', Auth::id())->sum('quantity');
    }
public function index (){
    $data=cart::where('user_id',Auth::id())->get();
    
    return view('User.order', ['data'=>$data]);
}
      
public function store(Request $request)
{
    $id=$request->id;
    $data=cart::where('product_id',$id)->where('user_id',Auth::id())->first();
    if($data){
        $data->quantity=$data->quantity+$request->input(key:'quantity');
    }
    else{
        $data = new Cart(); //
        $data->product_id = $request->input('id');
        $data->user_id = Auth::id(); // It's "user_id", not "users_id"
        $data->quantity = $request->input('quantity');
    }
   
    $data->save();

  Alert::success('
  The product has been added to cart','Continue shopping');

    return redirect()->back();
}
    public function delete($id)
{
    
   
    $data=cart::find($id);
    $data->delete();
    Alert::info('
    Product has been removed','Continue shopping');
   
    return redirect()->back()->with('info','Product delete form cart');
}
public function update(Request $request, $id)
{
    $data=cart::find($id);
    $data->quantity=$request->input(key:'quantity');
    $data->save();

    
    return redirect()->back();
}




   
}
