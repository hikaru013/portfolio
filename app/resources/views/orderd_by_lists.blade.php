@extends('layouts.layout')
@section('content')
<div class="page_title">販売履歴</div>

<!-- 購入した商品がない場合 -->
@if($sold_products->isempty())
    <div class="card text-center">
        <p class="p-5">購入された商品がありません</p>
    </div>

<!-- 購入した商品がある場合 -->
@elseif(!empty($sold_products))
    @foreach($sold_products as $sold)
    <div class="row" style="margin-top:20px;">

        <!-- 左側 -->
        <div class="d-flex align-items-center justify-content-center" style="width:40%">
            {{$sold->created_at->format('Y年m月d日H時i分')}}に購入されました
        </div>

        
        <!-- 商品画像 -->
        <div class="col" style="width:30%;">
            @foreach($sold->product->file as $file)
            <!-- ひとつ目の画像のみ取得 -->
            @if($loop->first)
            <img class="card-img-top" style="width:80%" src="{{$file->path}}">
            @endif
            
            @endforeach
        </div>
        
        
        <!-- 右側 -->
        <div class="col"style="width:25%">
            <div class="row">商品名：{{$sold->product->name}}</div>
            <div class="row">購入者：{{$sold->user->name}}</div>
            <div class="row">値段：{{$sold->price}}</div>
        </div>
    </div>
    @endforeach

@endif
@endsection