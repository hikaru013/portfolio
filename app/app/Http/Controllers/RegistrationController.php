<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// use Illuminate\Support\File;
use App\User;
use App\Product;
use App\File;
use App\Orderd_item;

class RegistrationController extends Controller
{
    // 新規会員登録 表示
        public function create_account(){
            return view('auth.register');
        }

    // 新規会員登録　実行
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

    // ログアウト実行
        public function logout(){
            auth::logout();
            return redirect('/home');
        }

    // 出品 表示
        // public function view_register_product(){
        //     return view('register_product');
        // }

    // 出品　実行
        public function exe_register_product(request $request){
            dd($request->all());
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
            foreach($files as $file){
                $file_table = New File;
                if ($request->file('file') == null) {
                    $files = "";
                    $file_name = "";
                    echo "error";
                
                }else{
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

    //出品編集 表示
        public function view_edit_product($productId){
            $file_table = new File;
            $files = $file_table->where('product_id',$productId)->exists();
            
            if($files === true){
                $file = $file_table->where("product_id",$productId)->first();
            }else{
                $file = $file_table->where('id',0)->first();
            }
            // dd($file);

            $product = product::find($productId);
            // dd($product);
                return view('edit_product',
                ['product'=>$product,
                'file'=>$file]);
            }

    //商品編集 実行
        public function exe_edit_product($productId,request $request){
            dd($request->all());
            $file_table = New File;
            $dir = 'product_img';
            $file =  $request->file('img');
            
            if ($request->file('file') == null) {
                $file = "";
                $file_name = "";
            }else{
                $file_name = $request->file('file')->getClientOriginalName();
                $file = $request->file('file')->storeAs('public/'.$dir,$file_name);  

            $file_table->product_id = $productId;
            // $request->file('file')->storeAs('public/', $dir ,$file_name);
            $file_table->name = $file_name;
            $file_table->path = 'storage/'.$dir.'/'.$file_name;
            $file_table->insert_time = carbon::now();
            $file_table->save();
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
            
            return redirect('/');
        }

    //商品画像 削除
        public function delete_img($productId){
            
            $file = new File;
            $file->where("product_id",$productId)->delete();

            return back();
        }
    // ユーザー情報編集 表示
        public function view_edit_user(){
            $user = Auth::user();

            return view('edit_user_info',[
                'user' => $user,
            ]);
        }

    // ユーザー情報編集 実行
        public function exe_edit_user(Request $request){

            // Filesテーブルへの保存
            $user_id = Auth::user()->id;
            $file_table = New File;
            $dir = 'product_img';
            $file =  $request->file('file');

            if ($request->file('file') == null) {
                $file = "";
                $file_name = "";
                // dd($request->all());
            }else{
                $file_name = $request->file('file')->getClientOriginalName();

                //画像を保存するだけの処理
               $request->file('file')->storeAs('public/'.$dir,$file_name);  
               
               $file_table->name = $file_name;
               $file_table->user_id = $user_id;
               
               $file_table->path = 'storage/'.$dir.'/'.$file_name;
               $file_table->insert_time = carbon::now();
               $file_table->save();
              
            }

            // Usersテーブルへの保存
            
            $user = new User;
            $record = $user->find($user_id);
  
            $file_id = $file_table->id;
            $record->file_id = $file_id;
            $record->name = $request->name;
            $record->birth = $request->birth;
            $record->tel = $request->tel;
            $record->email = $request->email;
            $record->payment = $request->payment;

            $record->save();

            return redirect("/user_info");
        }
    
    // カートに追加する
        public function addCart(request $request){
            $product_table = new Product;
            $file_table = new File;
            
            $product_id = $request->product_id;
            
            $SessionUserId = $request->user_id;
            $SessionProductId = $request->product_id;
            $SessionProductName = $request->name;
            $SessionProductPrice = $request->price;
            $SessionProductSize = $request->size;
            $SessionProductQuantity = $request->quantity;
            $SessionShopName = $product_table->where('id',$SessionProductId)->with('user')->first();
            $SessionProductImg = $file_table->where('product_id',$SessionProductId)->first();
            

            $SessionData = array();
            $SessionData = compact('SessionUserId','SessionProductImg','SessionShopName','SessionProductId','SessionProductName','SessionProductPrice','SessionProductSize','SessionProductQuantity');
            // dd($SessionProductImg);
            $request->session()->push('session_data', $SessionData);
            // session()->flush();
            return redirect("view_cart");
        }

    //カート内確認
        public function view_cart(){
        
        $file_table = new File;
        $defaultimg = $file_table->where('id',0)->first();
        // dd($defaultimg);
        $datas =session()->get('session_data');
        // dd($datas);
        if (!empty($datas)){
        $total_price = array_sum(array_column($datas, 'SessionProductPrice'));
        $shopname = array_column($datas,'SessionShopName');
        $productimg = array_column($datas,'SessionProductImg');
        }else{
            $total_price="";
            $shopname="";
            $productimg="";
        }
        //  session()->flush('session_data');
        
            return view('view_cart'
            ,compact('datas','total_price','shopname','productimg','defaultimg')
        );
        }

    //購入
        public function exe_buy(){
            $datas = session()->get('session_data');
           foreach($datas as $data =>$details){

            //$data=0,1,2... $details=$dataの中身
            $product_id = $details['SessionProductId'];
            $price = $details['SessionProductPrice'];
            $quantity = $details['SessionProductQuantity'];
            $size = $details['SessionProductSize'];
            $orderd_at = carbon::now();

            $orderd = new Orderd_item;
            $orderd->user_id = Auth::user()->id;
            $orderd->product_id = $product_id;
            $orderd->price = $price;
            $orderd->quantity = $quantity;
            $orderd->size = $size;
            $orderd->orderd_at = $orderd_at;

            // 在庫を減らす
            $product_stock = product::find($product_id)->decrement('stock',$quantity);
        
            $orderd->save();
           }
               foreach($details as $detail){
           }
            session()->forget('session_data');
            return redirect('/');
        }

    // カート削除
        public function del_cart(request $request){
            $key = $request->delete_number;
            $session = session()->get('session_data');
            session()->forget('$key');
            
            unset($session[$key]);
            $data = array_values($session);
            $session = session()->put('session_data',$data);

            // dd($data);
            
            return redirect('view_cart');
        }
//end
    }
