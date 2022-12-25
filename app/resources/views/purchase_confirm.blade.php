@extends('layouts.layout')
@section('content')
<div class="page_title" style="margin-bottom:30px;">購入確認</div>

<div class="xxx">

    <span class="d-flex">
        <p style="font-size:20px">注文者情報</p>
        <div class="user_info_button">
            <a class="btn btn-outline-secondary" href="{{route('view_edit_user')}}" style="">
                登録情報編集
            </a>
        </div>
    
    </span>

    <div class="" style="padding:10px">
        <ul class="list-group list-group-horizontal">
        <li class="hij list-group-item" >宛名</li>
        <li class="list-group-item flex-fill" >{{$user_info->name}}</li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="hij list-group-item" >送付先</li>
            <li class="list-group-item  flex-fill" >{{$user_info->address}}</li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="hij list-group-item" >電話番号</li>
            <li class="list-group-item flex-fill" >{{$user_info->tel}}</li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="hij list-group-item" >支払い方法</li>
            <li class="list-group-item flex-fill" >{{$user_info->payment}}</li>
        </ul>
    </div>
</div>

@if(!empty($datas))
@foreach($datas as $data)
<div class="mt-4">
<p style="font-size:20px">注文商品</p>
</div>
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
    <input type="submit"  onclick="return confirm('削除してよろしいですか？')"class="btn btn-outline-secondary" value="削除">
    </form>
    </div>
    
</div>
@endforeach
<div class="ABCD">
    <form action="{{route('exe_buy')}}" method="post">
    合計：
    <p class="cart_total_price">￥{{$total_price}}</p>
    <button type="button" class="btn btn-secondary">購入確定</button>
    </form>
</div>

<div class="EFG">
    <div>
    <form action="{{route('exe_buy')}}" method="post">
            @csrf
        <p class="cart_total_price">合計：{{$total_price}}円</p>
        <button type="submit"  onclick="return confirm('よろしいですか？')"class="btn btn-secondary">購入確定</button>
    </div>
</div>

<!-- カートに追加した商品がなければ -->
@else
<div class="card text-center">
    <p class="p-5">商品がありません</p>
</div>
@endif

@endsection