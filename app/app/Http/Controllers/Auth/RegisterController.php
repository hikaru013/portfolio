<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo =  RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'class_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birth' =>'required|min:8|max:8',
            'address' =>'required',
            'email' => 'required|email:filter|unique:users',
            'payment' =>'required',
        ],
        [
        'class_id.required' =>'種別を選択して下さい。',
        'name.required' => '名前を入力して下さい。',
        'password.required'=>'パスワードを入力して下さい。',
        'password.min'=>'パスワードは８文字以上で入力して下さい。',
        'password.confirmed'=>'パスワードが一致しません。',
        'birth.required'  => '生年月日を入力して下さい。',
        'birth.integer'  => '生年月日は数値で入力して下さい。例：YYYYMMDD',
        'birth.size'=>'生年月日は８桁で入力して下さい。例：YYYYMMDD',
        'address.required' =>'住所を入力して下さい。',
        'email.required'  => 'メールアドレスを入力して下さい。',
        'email.email' =>'メールアドレスは正しい形式で入力して下さい。',
        'payment.required'  => 'お支払い方法を選択して下さい。',        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'class_id' =>$data['class_id'],
            'birth' =>$data['birth'],
            'address' =>$data['address'],
            'payment' =>$data['payment'],
        ]);
    }
}
