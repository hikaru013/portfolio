<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegsistrationController extends Controller
{
    //
        // 新規会員登録 表示
        public function create_account(){
            return view('create_account');
        }

        // パスワードリセット 表示
        public function password_reset(){
            return view('password_reset');
        }
}
