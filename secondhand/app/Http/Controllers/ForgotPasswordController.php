<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use App\Mail\ForgotPassword;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class ForgotPasswordController extends Controller
{
    public function forgotpass()
    {
        return view('auth.passwords.reset');
    }
    public function checkforgotpass(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            $token = Str::random(50);
    
            $user->update([
                'token' => $token,
            ]);
    
            $tokenData = [
                'email' => $request->email,
                'token' => $token,
            ];

            Mail::to($request->email)->send(new ForgotPassword($user, $tokenData));
            Alert::success('
            The code has been sent to your email','
            Please check your email');
        }
    
        return redirect()->back();
    }
    
}