<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductController;


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

Auth::routes();

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

// middleware追記↓

//home
route::get('/',[DisplayController::class, 'index'])->name('top');

// 商品一覧リソース
route::resource('/product','ProductController');
route::get('/on_sale',[Displaycontroller::class,'on_sale'])->name('on_sale');

// 商品画像削除
route::post('/product/{id}',[RegistrationController::class,'delete_img'])->name('delete_img');

// カートに追加
route::post('/product_detail/{id}',[RegistrationController::class,'addCart'])->name('addCart');
//カート画面表示
route::get('/view_cart',[RegistrationController::class,'view_cart'])->name('view_cart');

Route::group(['middleware' => 'auth'],function(){
// カート内商品削除
route::post('/del_cart',[RegistrationController::class,'del_cart'])->name('del_cart');
//購入確認
route::get('/confirm',[RegistrationController::class,'purchase_confirm'])->name('confirm');

//購入実行
route::post('/exe_buy',[RegistrationController::class,'exe_buy'])->name('exe_buy');
});

//検索
route::get('/search',[DisplayController::class,'search'])->name('search');

//詳細検索
route::get('/filter_search',[DisplayController::class,'filter_search'])->name('filter_search');
route::get('/filter_search/exe',[DisplayController::class,'exe_filter_search'])->name('exe_filter_search');

//ショップ一覧
route::get('/shops_list',[DisplayController::class,'shops_list'])->name('shops_list');
//ショップ詳細
route::get('/shop_detail/{id}',[DisplayController::class,'shop_detail'])->name('shop_detail');


Route::group(['middleware' => 'auth'],function(){
//購入した商品一覧
route::get('/ordered_lists',[DisplayController::class,'ordered_lists'])->name('ordered_lists');
//購入された商品一覧
route::get('/orderd_by',[DisplayController::class,'orderd_by_lists'])->name('orderd_by_lists');
//いいね一覧
route::get('/likes_list',[DisplayController::class,'likes_list'])->name('likes_list');
});

//管理者の会員登録をする為、無効にしてある為middleware=>guestは無効化、vendorを弄るのは良くない為、viewで操作
//新規会員登録
route::get('/create_account',[RegistrationController::class,'create_account'])->name('create_account');
Route::post('/create_account',[RegistrationController::class, 'create_account'])->name('create_account_form');


Route::group(['middleware' => 'auth'],function(){
//登録情報 閲覧
route::get('/user_info',[DisplayController::class,'view_user_info'])->name('view_user_info');

//登録情報 編集画面
route::get('view_edit_user',[RegistrationController::class,'view_edit_user'])->name('view_edit_user');
route::post('view_edit_user',[RegistrationController::class,'exe_edit_user'])->name('exe_edit_user');
});

// 管理者のみ表示 controllerで認証チェック
// 管理者メニュー
route::get('/admin_menu',[DisplayController::class,'admin_menu'])->name('admin_menu');
//ユーザー一覧
route::get('/users_list',[DisplayController::class,'users_list'])->name('users_list');
//ユーザー削除
route::post('/users_list',[DisplayController::class,'user_delete'])->name('user_delete');

// ユーザーいいね
Route::group(['middleware' => 'auth'],function(){

Route::post('/like', [LikeController::class,'like']);
Route::post('/user_like',[LikeController::class,'user_like']);
});

Route::get('/home', 'HomeController@index')->name('home');
