<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\role;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); 
        $role = role::all(); 
        return view('Admin.information', compact('user', 'role'));
    }
    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();
            $filename = $user->avatar;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
            }
    
            $userData = [
                'name' => $request->input('name'),
                'avatar' => $filename,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'first_name' => $request->input('firstname'),
                'last_name' => $request->input('lastname'),
            ];
    
            DB::table('users')
            ->where('id', $user->id)
            ->update($userData);;
            Alert::success('
            Update Success','Click to continue');
            return redirect()->route('Admin.information');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }
    

}
