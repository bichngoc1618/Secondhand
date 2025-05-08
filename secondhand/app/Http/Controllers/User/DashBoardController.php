<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\cooperation;
use App\Models\reviews;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\cart;


use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class DashBoardController extends Controller
{
   public function home(){
      $categories=category::all()->take(4)  ;
      $review=reviews::all();
      $product = Product::with('category')->take(15)->get();
      $cooperation=cooperation::all();


    return view('User.home',compact('product','categories','cooperation','review'));
   }
   
   public function detail($title) {
      $products = Product::with('category')->take(8)->get();
      $product=Product::where('title', $title)->first();
      $reviews=reviews::with('Product')->get();
     
      return view('User.productDetail',compact('product','products','reviews'));
   }
 
     public function blog(cart $cart){
      return view('User.blog',compact('cart'));
     }
     public function contact(cart $cart){
      return view('User.contact',compact('cart'));
     }
    
   
    
   

   
     
}
