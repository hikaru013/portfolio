<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DisplayController;

class DisplayController extends Controller
{
    //home
    public function index(){
        return view('home');
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
        return view('login');
    }


}
