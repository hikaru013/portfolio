<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;


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

//home
route::get('/',[DisplayController::class, 'index'])->name('top');

//商品一覧
route::get('/products_list',[DisplayController::class,'products_list'])->name('products_list');
//商品詳細
route::get('product_detail',[DisplayController::class,'product_detail'])->name('product_detail');

//検索

//詳細検索
route::get('filter_search',[DisplayController::class,'filter_search'])->name('filter_search');

//ショップ一覧
route::get('/shops_list',[DisplayController::class,'shops_list'])->name('shops_list');
//ショップ詳細
route::get('shop_detail',[DisplayController::class,'shop_detail'])->name('shop_detail');

//購入した商品一覧
route::get('ordered_lists',[DisplayController::class,'ordered_lists'])->name('ordered_lists');

//購入された商品一覧
route::get('orderd_by',[DisplayController::class,'orderd_by_lists'])->name('orderd_by_lists');

//いいね一覧
route::get('/likes_list',[DisplayController::class,'likes_list'])->name('likes_list');

//ログイン
// route::post('auth.login',[DisplayController::class,'login'])->name('login');

//新規会員登録
route::get('/create_account',[RegistrationController::class,'create_account'])->name('create_account');
Route::post('/create_account',[RegistrationController::class, 'create_account'])->name('create_account_form');

//登録情報 閲覧
route::get('user_info',[DisplayController::class,'view_user_info'])->name('view_user_info');

//登録情報 編集画面
route::get('view_edit_user',[RegistrationController::class,'view_edit_user'])->name('view_edit_user');
route::post('view_edit_user',[RegistrationController::class,'exe_edit_user'])->name('exe_edit_user');


// パスワードリセット
route::get('password_reset',[RegistrationController::class,'password_reset'])->name('password_reset');

// ログアウト
// route::get('logout',[RegistrationController::class,'logout']);

//出品 表示/登録
Route::get('/register_product',[RegistrationController::class, 'view_register_product'])->name('view_register_product');
Route::post('/register_product',[RegistrationController::class, 'exe_register_product'])->name('exe_register_product');

// 管理者メニュー
route::get('admin_menu',[DisplayController::class,'admin_menu'])->name('admin_menu');

//ユーザー一覧
route::get('users_list',[DisplayController::class,'users_list'])->name('users_list');