@extends('layouts.layout')
@section('content')
    <div class="container d-flex">
        <!-- 左側 -->
        <div class="col">
            <div class="card">
                @foreach($items as $item)
                <img src="{{($item->path)}}" class="card_img_top" alt="1" width="50%" height="50%">
                @endforeach
            </div>

            <div class="col d-inline-flex flex-row">
                @foreach($items as $item)
                <img src="{{($item->path)}}" class="card_img_top" alt="2" width="25px" height="25px">
                <img src="{{($item->path)}}" class="card_img_top" alt="3" width="25px" height="25px">
                <img src="{{($item->path)}}" class="card_img_top" alt="4" width="25px" height="25px">
                <img src="{{($item->path)}}" class="card_img_top" alt="5" width="25px" height="25px">
                @endforeach
            </div>
        </div>
    
        <!-- 右側 -->
        <div class="col">
            <div class="card-body">{{$product->name}}</div>
            <div class="card-body">{{$product->price}}</div>
            <div class="card-body">
                <div class="card d-inline-flex flex-row">
                    <select name="size">
                        <option value="" selected hidden>サイズ</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                    </select>

                    <select name="数量">
                        <option value="" selected hidden>数量</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="card d-inline-flex flex-row">
                <button type="button" class="btn btn-outline-warning">カートに入れる</button>
                    <button type="button" class="btn btn-outline-info">購入</button>
                </div>
            </div>
            <div class="card-body">
                <div class="card d-inline-flex flex-row">
                    @foreach($items as $item)
                    <img src="{{($item->path)}}" class="card_img_top" alt="1" width="50px" height="50px">
                    @endforeach

                    <p>{{ $product->user->name }}</p>
                </div>
            </div>

            
        </div>
    </div>



<div class="container w-100">
<div class="card">テキスト</div>
</div>

@endsection