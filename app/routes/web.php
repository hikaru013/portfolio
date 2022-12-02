<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegsistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//home
route::get('/',[DisplayController::class, 'index'])->name('top');

//商品一覧
route::get('products_list',[DisplayController::class,'products_list'])->name('products_list');

//ショップ一覧
route::get('shops_list',[DisplayController::class,'shops_list'])->name('shops_list');

//いいね一覧
route::get('likes_list',[DisplayController::class,'likes_list'])->name('likes_list');

//ログイン
route::get('login',[DisplayController::class,'login'])->name('login');

//新規会員登録
route::get('create_account',[RegsistrationController::class,'create_account'])->name('create_account');

// パスワードリセット
route::get('password_reset',[RegsistrationController::class,'password_reset'])->name('password_reset');

