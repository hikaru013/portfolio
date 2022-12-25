<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use App\Product;
use App\Product_like;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\User_like;

class LikeController extends Controller
{
    // 商品へのいいね機能
    public function like(Request $request){
        
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
        return response()->json($param); 
    }

    
    //ユーザーへのいいね機能
    public function user_like(request $request){
        $user_id = Auth::user()->id; 
  
        $follow_id = $request->be_liked_id;
    
        $already_liked = user_like::where('likes_id', $user_id)->where('be_liked_id', $follow_id)->first(); //3.

        if (!$already_liked) { 
            $like = new user_like;
            $like->be_liked_id = $follow_id; 
            $like->likes_id = $user_id;
            $like->save();

        } else { 
            user_like::where('be_liked_id', $follow_id)->where('likes_id', $user_id)->delete();
        }
        
        $user_likes_count = user::withCount('be_liked')->findOrFail($follow_id)->be_liked_count;

        $param = [
            'user_likes_count' => $user_likes_count,
            
        ];
        Log::debug($user_likes_count);
        return response()->json($param); 
    }

    
}
