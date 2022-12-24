@extends('layouts.layout')
@section('content')
<div class="page_title" style="">登録情報</div>
<div class="frame d-flex align-items-center mx-auto center-block " style="margin-top:20px;width:60%;">

@if(auth()->user()->class_id ===2 ||auth()->user()->class_id ===3)
    <div class="mx-auto">
        <img src="{{( asset($file->path ))}}" class="card_img_top" alt="1" width="270px" height="270px">
    </div>
@endif

    <div class="mx-auto">
        <div class="col p-2">氏名：{{ $user->name }}</div>
        <div class="col p-2">生年月日：{{ $user->birth }}</div>
        <div class="col p-2">電話番号：{{ $user-> tel}}</div>
        <div class="col p-2">住所：{{ $user-> address}}</div>
        <div class="col p-2">メールアドレス：{{ $user-> email }}</div>
        <div class="col p-2">パスワード：***********</div>
        <div class="col p-2">支払い方法：{{ $user-> payment}}</div>
    </div>

</div>
<div class="row d-flex justify-content-around mx-auto" style="width:50%;margin-top:10px;">
    <a href="{{ route('view_edit_user') }}" class="btn btn-primary">編集</a>
    <a href="{{route('password.request')}}" class="btn btn-primary">パスワードリセット</a>
</div>
@endsection