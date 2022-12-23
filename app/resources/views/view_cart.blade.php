@extends('layouts.layout')
@section('content')
<div class="page_title" style="margin-bottom:30px;">カート内商品</div>

<!-- 下記foreach -->

<!-- カートに追加した商品があれば -->
@if(!empty($datas))

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
        <p class="col">@if (isset($data['SessionProductName'])){{ $data['SessionProductName'] }} @endif</p>
        <p class="col">サイズ：@if (isset($data['SessionProductSize'])){{ $data['SessionProductSize']}} @endif</p>
    </div>

        <div class="col-lg-3">
            <p class="col">@if(isset($shopname)){{$shopname[$loop->index]->user->name}} @endif</p>
            <p class="col">@if (isset($data['SessionProductQuantity']))個数：{{$data['SessionProductQuantity']}} @endif</p>
        </div>

    <div class="col-lg-3">
    <p class="individual_price">@if (isset($data['SessionProductPrice']))￥{{$data['SessionProductPrice']}} @endif</p>

    <!-- 削除ボタン -->
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
        <form action="{{route('exe_buy')}}" method="post">
            @csrf
        <p class="cart_total_price">合計：{{$total_price}}円</p>
        <button type="submit" class="btn btn-secondary">購入する</button>
    </div>
</div>

<!-- カートに追加した商品がなければ -->
@else
<div class="card text-center">
    <p class="p-5">商品がありません</p>
</div>
@endif
@endsection