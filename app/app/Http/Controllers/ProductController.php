<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\File;
use App\Product;
use App\User;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //商品一覧画面表示

        $file_table = new File;
            $user_table = new User;
            $product_table = new Product;
            $default_img = $file_table->where('id',0)->first('path');
            
            // 商品一覧取得
            // $products = $product_table;
            $products = Product::select('products.id', 'products.name','products.price', 'files.id as file_id',
                                        'files.name as files_name','files.path as file_path')
            ->leftjoin('files', 'files.product_id', '=', 'products.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->paginate(15);

            // dd($products);

            return view('product.index',[
                'products'=>$products,
                'default_img'=>$default_img,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新規出品画面表示
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        'name' => ['required'],
        'price' =>['required'],
        'stock' =>['required'],
        'sex' =>['required'],
        'size' =>['required'],
        'category' =>['required'],
        'detail' =>['required'],
        ],
        ['name.required' => '商品名を入力して下さい。',
        'price.required'  => '値段を入力して下さい。',
        'stock.required'  => '在庫を入力して下さい。',
        'sex.required'  => '性別を選択して下さい。',
        'size.required'  => 'サイズを選択して下さい。',
        'category.required'  => 'カテゴリを選択して下さい。',
        'detail.required' =>'商品詳細を入力して下さい。',

        ]);
       
        //新規出品 登録
        $dir = 'product_img';
            $files =  $request->file('file');
            
            $product = new Product;
            $user_id = Auth::User()->id;

            // $file->product_id = $id;
            $product->user_id = $user_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->category = $request->category;
            $product->size = $request->size;
            $product->sex = $request->sex;
            $product->detail = $request->detail;

            $product->save();

            $file_table = New File;
    
        if(!empty($files)){
            foreach($files as $file){
                $file_table = New File;
                    $file_name = $file->getClientOriginalName();
                    
                    //画像を保存するだけの処理
                    $file->storeAs('public/'.$dir,$file_name);  
                    
                    $product_id=$product->id;
                    
                    $file_table->name = $file_name;
                    $file_table->product_id = $product_id;
                    
                    $file_table->path = 'storage/'.$dir.'/'.$file_name;
                    $file_table->insert_time = carbon::now();
                    $file_table->save();

            };
        };
       
            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        // 商品詳細表示
        // 商品画像取得
        $file_table = new File;
        $files = $file_table->where('product_id',$productId)->exists();
        // もし画像が登録されていなければデフォルトイメージ
        if($files === true){
            // メイン画像
            $file = $file_table->where("product_id",$productId)->first();
            // サブ画像
            $files = $file_table->where("product_id",$productId)->get();
        }else{
            $file = $file_table->where('id',0)->first();
            $files = $file_table->where('id',0)->get();
        }

        // 商品情報取得
        $product_table = new product;
        $product = $product_table->withcount('product_likes')->find($productId);

        if(!isset($product->user)){
            abort(404);
        }
        // dd($product_table->user);

        // 出品者画像取得
        $file_id = $product->user->file_id;
        
        //もし画像が登録されていなければデフォルトイメージ
        if(empty($file_id)){
            $user_img = $file_table->where('id','0')->first();
        }else{
            $user_img = $file_table->where('id',$file_id)->first();
        }

        return view('product.show',
                    ['product'=>$product,
                        'file'=>$file,
                        'files'=>$files,
                    'user_img'=>$user_img,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        //編集画面表示

        $file_table = new File;
        $files = $file_table->where('product_id',$productId)->exists();
        
        if($files === true){
            $file = $file_table->where("product_id",$productId)->get();

        }else{
             // もし画像が登録されていなければデフォルトイメージ
            $file = $file_table->where('id',0)->first();
        }

        // 商品情報取得
        $product = product::find($productId);

        return view('product.edit',
        ['product'=>$product,
        'file'=>$file]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        //編集内容保存
        $request->validate([
            'name' => ['required'],
            'price' =>'integer | required',
            'stock' =>'integer | required',
            'sex' =>['required'],
            'size' =>['required'],
            'category' =>['required'],
            'detail' =>['required'],
            ],
            ['name.required' => '商品名を入力して下さい。',
            'price.required'  => '値段を入力して下さい。',
            'price.integer' =>'値段は数字で入力して下さい。',
            'stock.required'  => '在庫を入力して下さい。',
            'stock.integer' =>'在庫は数字で入力して下さい。',
            'sex.required'  => '性別を選択して下さい。',
            'size.required'  => 'サイズを選択して下さい。',
            'category.required'  => 'カテゴリを選択して下さい。',
            'detail.required' =>'商品説明を入力して下さい。'
    
            ]);

        // dd($request->all());

        $file_table = New File;
        $dir = 'product_img';
        $files =  $request->file('img');


        if(!empty($files)){
            foreach($files as $file){

                $file_table = New File;
                $file_name = $file->getClientOriginalName();
                $file = $file->storeAs('public/'.$dir,$file_name);  

                $file_table->product_id = $productId;
                // $request->file('file')->storeAs('public/', $dir ,$file_name);
                $file_table->name = $file_name;
                $file_table->path = 'storage/'.$dir.'/'.$file_name;
                $file_table->insert_time = carbon::now();
                $file_table->save();
                }
            }else{
                $file = "";
                $file_name = "";
            }
            

            $product = new Product;
            $product = $product->find($productId);
            
            $user_id = Auth::User()->id;

            // $file->product_id = $id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->category = $request->category;
            $product->size = $request->size;
            $product->sex = $request->sex;
            $product->detail = $request->detail;

            $product->save();
            
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId){
        // 商品削除
        // dd($productId);
        $product = new Product;
        $product->destroy($productId);

        // 商品に登録されている画像も削除
        $file = new File;
        $file->where("product_id",$productId)->delete();

        //削除
        return redirect()->route('product.index');
    }
}
