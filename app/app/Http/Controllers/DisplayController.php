<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\DB;
use Auth;
use App\File;
use App\Product;
use App\User;
use App\orderd_item;
use App\user_like;

class DisplayController extends Controller
{
    //home
        public function index(){

        $file_table = new File;
        $user_table = new User;

        //デフォルトイメージを取得
        $default_img = $file_table->where('id',0)->first('path');
        
        // 商品一覧取得
        $productwithfile = Product::select('products.id', 'products.name','products.price', 'files.id as file_id',
                                            'files.name as files_name','files.path as file_path')
        ->leftjoin('files', 'files.product_id', '=', 'products.id');
        
        $products = $productwithfile->withCount('product_likes')->orderBy('product_likes_count', 'desc')->get();  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述

        // ショップ一覧取得
        $users = $user_table->where('class_id','2')->with('file')->get();
     
        // いいね一覧取得
        $likes="";
        
        if(Auth::check()){
        $user_id=Auth::user()->id;
        $likes = $productwithfile->wherehas('product_likes',function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->get();}
        
        return view('home',compact('default_img','products','users','likes'));
        }

    //商品一覧
        public function products_list(){

            $file_table = new File;
            $user_table = new User;
            $product_table = new Product;
            $default_img = $file_table->where('id',0)->first('path');
            
            // 商品一覧取得
            $products = $product_table;
            $products = Product::select('products.id', 'products.name','products.price', 'files.id as file_id',
                                        'files.name as files_name','files.path as file_path')
            ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->paginate(8);

            return view('products_list',[
                'products'=>$products,
                'default_img'=>$default_img,
            ]);
        }
    //出品商品 表示(ResourceControllerとは別)
        public function on_sale(){

            $file_table = new File;
            $user_table = new User;
            $product_table = new Product;
            $default_img = $file_table->where('id',0)->first('path');
            
            // 商品一覧取得
            $products = $product_table;
            $products = Product::select('products.id','products.user_id', 'products.name','products.price', 'files.id as file_id',
                                        'files.name as files_name','files.path as file_path','products.updated_at')
            ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->where('products.user_id',auth::user()->id)->orderBy('updated_at')->paginate(10);
            // dd($products);


            return view('on_sale',compact('products','default_img')
            );
        }

    // 検索結果表示画面
        public function search(request $request ){
            $file_table = new File;
            $user_table = new User;
            $product_table = new Product;
            $default_img = $file_table->where('id',0)->first('path');
            
            $word = $request->search;

            // 商品一覧取得
            $products = $product_table;
            $products = Product::select('*')// 主となるテーブル名
            ->select('products.id', 'products.name','products.price', 'files.id as file_id',
                    'files.name as files_name','files.path as file_path')
            ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->where('products.name','LIKE',"%$word%")->paginate(8);


            return view('product.index',[
                'products'=>$products,
                'default_img'=>$default_img,
            ]);
        
        }

    // 詳細検索
        public function filter_search(){
            return view('filter_search');
        }
    //詳細検索実行
        public function exe_filter_search(request $request){
            // dd($request->all());

            $file_table = new File;
            $user_table = new User;
            $product_table = new Product;
            $default_img = $file_table->where('id',0)->first('path');
            
            $word = $request->search;
            $size = $request->size;
            $sex = $request->sex;
            $category = $request->category;

            // 商品一覧取得
            $products = $product_table;
            $products = Product::select('*')// 主となるテーブル名
            ->select('products.id', 'products.name','products.price', 'files.id as file_id',
                    'files.name as files_name','files.path as file_path',
                    'products.size','products.category','products.sex')
            ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->where('products.name','LIKE',"%$word%");
            
            if(!empty($category)){
                $products = $products->where('products.category',$category);
            };

            if(!empty($size)){
                $products = $products->where('products.size',$size);                
            };

            if(!empty($sex)){
                $products = $products->where('products.sex',$sex);
            };
            
            $products = $products->paginate(8);

            return view('product.index',[
                'products'=>$products,
                'default_img'=>$default_img,
            ]);
        
        }

    //商品詳細
        public function product_detail($productId){

        // 商品画像取得
        $file_table = new File;
        $files = $file_table->where('product_id',$productId)->exists();
        
        if($files === true){
            $file = $file_table->where("product_id",$productId)->first();
            $files = $file_table->where("product_id",$productId)->get();
        }else{
            $file = $file_table->where('id',0)->first();
            $files = $file_table->where('id',0)->get();
        }

        // 商品情報取得
        $product_table = new product;
        $product = $product_table->withcount('product_likes')->find($productId);
    
        
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
                        'files'=>$files,
                    'user_img'=>$user_img,
                ]);
        }
    
    
    //ショップ一覧
        public function shops_list(){
        $user_table = new User;
        $users = $user_table->where('class_id','2')->with('file')->get();

        $file_table = new File;
        $product_table = new Product;
        $default_img = $file_table->where('id',0)->first('path');
        
        // 商品一覧取得
        $products = $product_table;
        $products = Product::select('*')
        ->select('products.id', 'products.name','products.price', 'files.id as file_id',// 主となるテーブル名
                 'files.name as files_name','files.path as file_path')
        ->leftjoin('files', 'files.product_id', '=', 'products.id')->paginate(8);  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述

       

        return view('shops_list',[
            'products'=>$products,
            'default_img'=>$default_img,
            'users' =>$users,
        ]);

        // return view('shops_list',compact('users'));
        }

    //ショップ詳細
        public function shop_detail($userId){

        // ショップ情報と出品した商品情報取得
        $user_table = new User;
        $users = $user_table->with('file','products')->find($userId);
        $default_img = file::where('id',0)->first('path');
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
        
        $user = user::withCount('likes')->find($userId);
        // dd($user);

        return view('shop_detail',
                    ['user'=>$user,
                    'users'=>$users,
                    'user_img'=>$user_img,
                    'products'=>$products,
                    'default_img'=>$default_img]);
        }

    //購入履歴
        public function ordered_lists(){
            $orderd_items = auth::user()->orderd_items;
            $default_img = file::where('id',0)->first('path');

            return view('ordered_lists',compact('orderd_items','default_img'));
        }
    // 売却履歴
        public function orderd_by_lists(){
  
            $sold_products = auth::user()->orderd_item;

            // dd($sold_products);
            foreach($sold_products as $products){
                $product_id = $products->id;
                $sold_item = orderd_item::where('product_id',$product_id)->get();
                
            }
            // dd($product_id,$sold_products,$products);
            return view('orderd_by_lists',compact('sold_products'));
        }

    //いいね一覧
        public function likes_list(){

            $file_table = new File;
            $user_table = new User;
           //デフォルトイメージを取得
        $default_img = $file_table->where('id',0)->first('path');
        
        // 商品一覧取得
        $productwithfile = Product::select('products.id', 'products.name','products.price', 'files.id as file_id',
                                            'files.name as files_name','files.path as file_path')
        ->leftjoin('files', 'files.product_id', '=', 'products.id');
        
        $products = $productwithfile->withCount('product_likes')->orderBy('product_likes_count', 'desc')->get();  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述

        // いいね一覧取得
        $likes="";
        
        if(Auth::check()){
        $user_id=Auth::user()->id;
        $likes = $productwithfile->wherehas('product_likes',function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->get();}
        
            return view('likes_list',compact('default_img','products','likes'));
        }

    // ユーザー情報　閲覧
        public function view_user_info(){
        $user = Auth::user();

        $user_id = Auth::user()->id;

        $file_table = new File;
        $files = $file_table->where('user_id',$user_id)->exists();

        if($files === true){
            $file = $file_table->where('user_id',$user_id)->first();
        }else{
            $file = $file_table->where('id',0)->first();
        }
        return view('user_info',[
            'user' => $user,
            'file' => $file,
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

    //ユーザー削除
        public function user_delete(request $request){
            $user_id = $request->user_id;
            $user = new User;
            $user->destroy($user_id);

            $product_table =new Product;
            $product = $product_table->where('user_id',$product)->destroy();
            dd($product);
            return back();

        }

    //ログイン画面
        public function login(){
            return view('auth.login');
        }


}
