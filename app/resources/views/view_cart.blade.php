@extends('layouts.layout')
@section('content')
<div class="page_title" style="margin-bottom:30px;">カート内商品</div>

<!-- 下記foreach -->
@foreach($datas as $data)
<div class="cart_frame">
    
        <div class="col-lg-3 text-center">
            
           @if(empty($productimg[$loop->index]->path))
           
            <img class="frame" src="{{$defaultimg->path}}" style="width:150px;height:150px;"alt="photo">
            @else
            <img class="frame" src="{{$productimg[$loop->index]->path}}" style="width:150px;height:150px;"alt="photo">
            @endif
        </div>
    <div class="col-lg-3">
 
        <p class="col">{{ $data['SessionProductName'] }}</p>

        <p class="col">サイズ：{{ $data['SessionProductSize']}}</p>
    </div>

        <div class="col-lg-3">
            <p class="col">{{$shopname[$loop->index]->user->name}}</p>
            <p class="col">個数：{{$data['SessionProductQuantity']}}</p>
        </div>

    <div class="col-lg-3">
    <p class="individual_price">￥{{$data['SessionProductPrice']}}</p>
    <form action="{{route('del_cart')}}" method="post">
    @csrf
    <input type="hidden" name="delete_number" value="{{$loop->index}}">
    <input type="submit" class="btn btn-outline-secondary" value="削除">
    </form>
    </div>
    
</div>
@endforeach
<div class="ABCD">
    合計：
    <p class="cart_total_price">￥{{$total_price}}</p>
    <button type="button" class="btn btn-secondary">購入する</button>
</div>

<div class="EFG">
    <div>
        <p class="cart_total_price">合計：{{$total_price}}円</p>
        <button type="button" class="btn btn-secondary">購入する</button>
    </div>
</div>

@endsection