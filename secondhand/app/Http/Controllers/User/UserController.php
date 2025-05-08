<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Helper\cart;
use RealRashid\SweetAlert\Facades\Alert;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function register(cart $cart){
     
        return view('User.register',compact('cart'));
        

    }
    public function postRegister(RegisterRequest $request){
        $request->merge(['password'=>Hash::make($request->password)]);
       try{
        User::create($request->all());
        Alert::success('
        Register Success','Login to continue');
        return redirect()->route('login');
       
    
       }
       catch(\Throwable $th){
        dd($th);
        return redirect()->route('User.register');
        

       }
    }
    public function login(cart $cart){
        return view('User.login',compact('cart'));
    }
    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            Alert::success('
        Login Success','Welcome to ReEarth');
        if(Auth::user()->role_id==1){
            return redirect()->route('category.index');
        }
            return redirect()->route('User.home');
        }
        return redirect()->route('login');

    }
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('login');
    }
}
