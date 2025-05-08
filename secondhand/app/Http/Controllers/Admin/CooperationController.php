<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperation;
class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperation=cooperation::all();


        return view('Admin.cooperation.index',compact('cooperation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cooperationOptions = Cooperation::distinct()->pluck('visible');
    
    
        return view('Admin.cooperation.add', compact('cooperationOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $filename = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
            }

            $cooperationData = [
                'name' => $request->input('name'),
                'logo' => $filename, 
                'visible' => $request->input('visible'),
            ];
    
        
           cooperation::create($cooperationData);
    
            return redirect()->route('cooperation.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cooperation $cooperation)
    {
        $cooperationOptions = Cooperation::distinct()->pluck('visible');
        return view('Admin.cooperation.edit', compact('cooperation','cooperationOptions'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cooperation $cooperation)
    {
        try {
            $filename = $cooperation->logo;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $ext = $request->file('image')->extension();
                $filename = 'secondhand_' . $file->hashName(); 
                $file->move(public_path('assets/images'), $filename);
            }

            $cooperationData = [
                'name' => $request->input('name'),
                'logo' => $filename, 
                'visible' => $request->input('visible'),
            ];
    
        
           $cooperation->update($cooperationData);
    
            return redirect()->route('cooperation.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cooperation $cooperation)
    {
        try {
            $cooperation->delete();
            return redirect()->route('cooperation.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while deleting the cooperation');
        }
    }
}
