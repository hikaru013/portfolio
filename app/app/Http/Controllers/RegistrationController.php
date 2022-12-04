<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegistrationController extends Controller
{
    //
        // 新規会員登録 表示
        public function create_account(){
            return view('auth.register');
        }

        public function create_account_form(Request $request){
            // dd($user);
    
            // dd($request->all());
            
            $columns = ['name', 'class_id'];
            
            foreach($columns as $column){
                $user->$column = $request->$column;
            }
            
            // 6-4 P11
            Auth::user()->save($user);
            return redirect('/');
        }

        // パスワードリセット 表示
        public function password_reset(){
            return view('password_reset');
        }

        public function logout(){
            auth::logout();
            return redirect('/home');
        }
}
