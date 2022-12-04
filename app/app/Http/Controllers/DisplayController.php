<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DisplayController;
use Auth;

class DisplayController extends Controller
{
    //home
    public function index(){
        $class_id = Auth::user()->class_id;
        
        return view('home',[
            // 'class_id'=>$class_id,
        ]);
    }

    //商品一覧
    public function products_list(){
        return view('products_list');
    }

    //ショップ一覧
    public function shops_list(){
        return view('shops_list');
    }

    //いいね一覧
    public function likes_list(){
        return view('likes_list');
    }

    //ログイン画面
    public function login(){
        return view('auth.login');
    }


}
