<?php

// app/Http/Controllers/ResetPasswordController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
      

        return view('auth.passwords.confim', ['token' => $token]);
    }

    public function resetPassword(Request $request, $token)
    {
       
    
        $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        
       
        $user = User::where('token', $token);
 
    

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid reset link');
        }

        // Đặt lại mật khẩu
        $user->update([
            'password' => Hash::make($request->password),
            'token' => null,
        ]);

        Alert::success('
        Change Success','
        Log in to continue');
        return redirect()->route('login');
    }
    }

