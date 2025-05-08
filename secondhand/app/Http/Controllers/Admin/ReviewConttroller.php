<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;
use PhpParser\Node\Stmt\TryCatch;

class ReviewConttroller extends Controller
{
    public function index()
    {
        
        $review = reviews::paginate(15); 
    
      
        return view('Admin.review.index', compact('review'));
    } 
    public function updateReviewDisplay($reviewId, Request $request)
          {
            try {
                $review = reviews::findOrFail($reviewId);
                $review->update(['display' => $request->input('display')]);
    
                return redirect()->back();
            } catch (\Throwable $th) {
                dd($th);
                return redirect()->back();
            }
          
           }
           public function destroy(reviews $review)
           {
               try {
                   $review->delete();
                   return redirect()->route('review.index');
               } catch (\Throwable $th) {
                   return redirect()->back();
               }
           }
           public function search(Request $request)
           {
             
               $query = $request->input('query');
             
               $filteredProducts = reviews::whereHas('product', function ($productQuery) use ($query) {
                $productQuery->where('title', 'like', "%$query%");
            })->paginate(12);
           
               // Đặt tham số truy vấn cho phân trang của danh mục đã lọc
               $filteredProducts->appends(['query' => $query]);
               $review = $filteredProducts;
           
               // Truyền biến filteredProducts và query vào view
               return view('Admin.review.index', compact('review', 'query'));
           }
           
           public function suggestions(Request $request)
           {
               $data = $request->all();
           
               if ($data['query']) {
                   $suggestions = reviews::whereHas('product', function ($query) use ($data) {
                       $query->where('title', 'like', '%' . $data['query'] . '%');
                   })
                   ->take(5)
                   ->get();
           
                   $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-transform: unset !important;">';
                   foreach ($suggestions as $key => $val) {
                       $output .= '<li class="li_search_ajax"><a href="#">' . $val->product->title . '</a></li>';
                   }
                   $output .= '</ul>';
           
                   return response()->json(['html' => $output]);
               }
           }
           
  
}
