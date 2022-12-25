@extends('layouts.layout')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

@if ($errors->any())
	    <div class="alert alert-danger mx-auto" style="width:80%;">
	        <ul class="text-center">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    <div class="row-lg-12 d-flex">
    
        <!-- 左側 -->
        <div class="col-lg-8">
            
            <a data-lightbox="demo" href="{{( asset($file->path ))}}"><img src="{{( asset($file->path ))}}" class="card_img_top" alt="1" width="500px" height="500px"></a>
            
            <div class="card w-75 mx-auto">
            <ul class="sub_img">
          
            @foreach($files as $file)
                @if($loop->first == true)
                    <a data-lightbox="group" href="{{asset($file->path)}}">
                    @else<a data-lightbox="demo" href="{{asset($file->path)}}">
                <li><img src="{{asset($file->path)}}" class="card_img_top" style="width:130px; height:130px;"alt="2"></li>
                @endif</a>
                @endforeach
            </ul>
            
            </div>
        </div>
        
 
      

        <!-- 右側 -->
        <div class="col-lg-4">
              <!-- 出品者のみ表示 -->
              @auth
            @if($product->user_id === Auth::user()->id||Auth::user()->class_id === 3)
            <a href="{{route('product.edit',['product' => $product->id])}}">
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
                        <option value="3">4</option>
                        <option value="3">5</option>
                    </select>
                
                    @auth
                    @if (!$product->isLikedBy(Auth::user()))
                    <!-- 未いいねの際の表示 -->
                        <span class="likes">
                            <p>いいね</p>
                            <i class="far fa-heart like-toggle size" data-product-id="{{ $product->id }}"></i>
                        <span class="like-counter">{{$product->product_likes_count}}</span>
                        </span>
                    @else
                    <!-- いいね済の際の表示 -->
                        <span class="likes">
                            <p >いいね</p>
                            <i class="fas fa-heart like-toggle liked size" data-product-id="{{ $product->id }}"></i>
                        <p class="like-counter">{{$product->product_likes_count}}</p>
                        </span>
                    @endif
                    @endauth
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

                @auth
                <input type="submit"  class="btn btn-primary outline" value="カートに入れる"></button>
                    <button type="button" class="btn btn-outline-info">購入</button>
                </div>
                @endauth

                @guest
                <a href="{{ route('login')}}" class="btn btn-outline-warning">カートに入れる</a>
                <a href="{{ route('login')}}" class="btn btn-outline-info">購入</a>
                @endguest

                
            </div>
                <a href="{{ route('shop_detail',['id' => $product->user->id]) }}">
                <div class="shop_detail">
  
                    <img src="{{(asset($user_img->path))}}"alt="1">

                    <p>{{ $product->user->name }}</p>
                </div>
</a>
                </form>
            
        </div>
    </div>
    </div>



<div class="product_description">
    <div class="description">{{ $product->detail}}</div>
</div>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
@endsection