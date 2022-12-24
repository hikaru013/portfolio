@extends('layouts.layout')
@section('content')
<div class="page_title">購入履歴</div>

<!-- 購入した商品がない場合 -->
@if($orderd_items->isempty())
    <div class="card text-center">
        <p class="p-5">購入した商品がありません</p>
    </div>

<!-- 購入した商品がある場合 -->
@elseif(!empty($orderd_items))
    @foreach($orderd_items as $orderd_item)
    <div class="row" style="margin-top:20px;">

        <!-- 左側 -->
        <div class="d-flex align-items-center justify-content-center" style="width:40%">
            {{$orderd_item->created_at->format('Y年m月d日H時i分')}}に購入しました
        </div>

        
        <!-- 商品画像 -->
        <div class="col" style="width:30%;">
            @foreach($orderd_item->product->file as $file)
            <!-- ひとつ目の画像のみ取得 -->
            @if($loop->first)
            <img class="card-img-top" style="width:50%" src="{{$file->path}}">
            @endif
            
            @endforeach
        </div>
        
        
        <!-- 右側 -->
        <div class="col"style="width:25%">
            <div class="row">商品名：{{$orderd_item->product->name}}</div>
            <div class="row">出品者：{{$orderd_item->product->user->name}}</div>
            <div class="row">値段：{{$orderd_item->product->price}}</div>
        </div>
    </div>
    @endforeach

@endif
@endsection