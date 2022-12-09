@extends('layouts.layout')
@section('content')
<div class="page_title">登録情報</div>
<div class="card">
<div class="row">
    <div class="col">氏名：{{ $user->name }}</div>
    <div class="col">カナ：</div>
</div>

<div class="row">生年月日：{{ $user->birth }}</div>
<div class="row">電話番号：{{ $user-> tel}}</div>
<div class="row">住所：{{ $user-> address}}</div>
<div class="row">メールアドレス：{{ $user-> email }}</div>
<div class="row">パスワード：***********</div>
<div class="row">支払い方法：{{ $user-> payment}}</div>
</div>
<div class="row d-flex justify-content-around">
    <a href="{{ route('view_edit_user') }}" class="btn btn-primary">編集</a>
    <a href="" class="btn btn-primary">パスワードリセット</a>
</div>
@endsection