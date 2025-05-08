<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            

            $review = [
                'comment' => $request->input('comment'),
                'user_id' => $request->input('user_id'),
                'product_id' => $request->input('product_id'),
            ];
    
        
           reviews::create($review);
 
            return redirect()->back();
        } catch (\Throwable $th) {
            
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }
}
