<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\DB;
use Auth;
use App\File;
use App\Product;
use App\User;

class DisplayController extends Controller
{
    //home
    public function index(){

        $file_table = new File;
        $user_table = new User;
        $default_img = $file_table->where('id',0)->first('path');
        
        // 商品一覧取得
        $products = DB::table('products')  // 主となるテーブル名
        ->select('products.id', 'products.name','products.price', 'files.id as file_id',
                 'files.name as files_name','files.path as file_path')
        ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->get();

        // ショップ一覧取得
        $users = $user_table->where('class_id','2')->with('file')->get();
        // dd($users);

        return view('home',compact('default_img','products','users'));
    }

    //商品一覧
    public function products_list(){
        $product = new Product;
        $products = $product->all();

        $file = new File;
        $files = $file->all();
        
        return view('products_list',[
            'products'=>$products,
            'files'=>$files,
        ]);
    }

    //商品詳細
    public function product_detail($productId){
        // dd($productid);

        // 商品画像取得
        $file_table = new File;
        $files = $file_table->where('product_id',$productId)->exists();
        
        if($files === true){
            $file = $file_table->where("product_id",$productId)->first();
        }else{
            $file = $file_table->where('id',0)->first();
        }

        // 商品情報取得
        $product_table = new product;
        $product = $product_table->find($productId);
        
        // 出品者画像取得
        $file_id = $product->user->file_id;

        if(empty($file_id)){
            $user_img = $file_table->where('id','0')->first();
        }else{
            $user_img = $file_table->where('id',$file_id)->first();
        }
        

        return view('product_detail',
                    ['product'=>$product,
                        'file'=>$file,
                    'user_img'=>$user_img]);
        }
    
    // 詳細検索
    public function filter_search(){
        return view('filter_search');
    }

    //ショップ一覧
    public function shops_list(){
        return view('shops_list');
    }

    //ショップ詳細
    public function shop_detail($userId){

     // ショップ情報と出品した商品情報取得
        $user_table = new User;
        $users = $user_table->with('file','products')->find($userId);
        // dd($users);

     // ロゴ情報取得
         $file_table = new File;
        $files = $file_table->where('user_id',$userId)->exists();
        
        if($files === true){
            $user_img = $file_table->where("user_id",$userId)->first();
        }else{
            $user_img = $file_table->where('id',0)->first();
        }
        
    //商品画像取得

        $products = DB::table('products')  // 主となるテーブル名
        ->select('products.id','products.user_id', 'products.name','products.price','files.id as file_id',
                 'files.name as files_name','files.path as file_path')
        ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->where('products.user_id',$userId)->get();
        // dd($products);
        
        return view('shop_detail',
                    ['users'=>$users,
                    'user_img'=>$user_img,
                    'products'=>$products]);
    }

    //購入履歴
    public function ordered_lists(){
        return view('ordered_lists');
    }
    // 売却履歴
    public function orderd_by_lists(){
        return view('orderd_by_lists');
    }

    //いいね一覧
    public function likes_list(){
        return view('likes_list');
    }

    // ユーザー情報　閲覧
    public function view_user_info(){
    $user = Auth::user();
    return view('user_info',[
        'user' => $user,
    ]);}

    // 管理者メニュー
    public function admin_menu(){
        return view('admin_menu');
    }

    // ユーザー一覧
    public function users_list(){
        $users = User::all();
        return view('users_list',[
            'users' => $users,
        ]);
    }

    //ログイン画面
    public function login(){
        return view('auth.login');
    }


}
