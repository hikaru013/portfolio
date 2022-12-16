@extends('layouts.layout')
@section('content')

    <div class="row-lg-12 d-flex">
        <!-- 左側 -->
        <div class="col-lg-8">
            <img src="{{( asset($file->path ))}}" class="card_img_top" alt="1" width="500px" height="500px">


            <div class="card w-75 mx-auto">
            <ul class="sub_img">
            <li><img src="{{($file->path)}}" class="card_img_top" alt="2"></li>
            <li><img src="{{($file->path)}}" class="card_img_top" alt="3"></li>
            <li><img src="{{($file->path)}}" class="card_img_top" alt="4"></li>
            <li><img src="{{($file->path)}}" class="card_img_top" alt="5"></li>
            </ul>
            </div>
        </div>
        
 
      

        <!-- 右側 -->
        <div class="col-lg-4">
              <!-- 出品者のみ表示 -->
              @auth
            @if($product->user_id === Auth::user()->id||Auth::user()->class_id === 3)
            <a href="{{route('view_edit_product',['id' => $product->id])}}">
            <button type="button" class="btn btn-secondary">編集</button>
            </a>
            @endif
            @endauth
        <form method="post" action="{{route('addCart',['id' => $product->id])}}">
                @csrf

            <div class="card-body">
                <span class="name">{{$product->name}}</span>
            </div>

          

            <div class="card-body" name="price">¥{{$product->price}}</div>
            <div class="card-body">
                <div class="">
                    <select name="size">
                        <option value="" name="size" selected hidden>サイズ</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                    </select>

                    <select name="quantity">
                        <option value="" name ="quantity" selected hidden>数量</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
               
            </div>
            <div class="card-body">
                <div class="purchase">

                @auth
                <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                @endauth
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">

                <input type="submit"  class="btn btn-outline-warning" value="カートに入れる"></button>
                    <button type="button" class="btn btn-outline-info">購入</button>
                </div>
            </div>
                <div class="shop_detail">
  
                    <img src="{{(asset($user_img->path))}}"alt="1">

                    <p>{{ $product->user->name }}</p>
                </div>
                </form>
            
        </div>
    </div>
    </div>



<div class="product_description">
<div class="description">{{ $product->detail}}</div>
</div>

@endsection