<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Product_like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        
        $user_id = Auth::user()->id; 
        $product_id = $request->product_id;
        $already_liked = product_like::where('user_id', $user_id)->where('product_id', $product_id)->first(); //3.
    
        if (!$already_liked) { 
            $like = new product_like; 
            $like->product_id = $product_id; 
            $like->user_id = $user_id;
            $like->save();

        } else { 
            product_like::where('product_id', $product_id)->where('user_id', $user_id)->delete();
        }
        
        $product_likes_count = product::withCount('product_likes')->findOrFail($product_id)->product_likes_count;

        $param = [
            'product_likes_count' => $product_likes_count,
            
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す　→返っていない？
    }
}
