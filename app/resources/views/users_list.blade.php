@extends('layouts.layout')
@section('content')
<div class="title_frame">
    <div class="page_title">ユーザー 一覧</div>
</div>

<div class="container">
<table class="table table-striped" style="margin:auto;width:50%">
  <thead>
    <tr>
      <th scope="col" style="border-right:0.5px solid #dee2e6;">#</th>
      <th class="text-center" scope="col">ID</th>
      <th class="text-center" scope="col">種別</th>
      <th class="text-center" scope="col">名前</th>
      <th class="text-center" scope="col">　　</th>


    </tr>
  </thead>
  <tbody>

  @foreach($users as $user)
  <tr>
      <td class="" scope="row" style="border-right:1px solid #dee2e6;">{{$loop->index}}</th>
      <td class="text-center">{{$user->id}}</td>
      <td class="text-center">@if($user->class_id === 1)
            購入者
            @endif
        
            @if($user->class_id === 2)
            出品者
            @endif
        
            @if($user->class_id === 3)
            管理者
            @endif</td>
      <td class="text-center" style="width:200px">{{$user->name}}</td>
      <td class="text-center">
        <form action="{{ route('user_delete') }}" method="post">
        @csrf    
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <button type="submit"class="delete-action btn btn-outline-danger btn-sm" >削除</button>
        </form>
</tr>
@endforeach

  </table>

@foreach($users as $user)
<div class="container d-flex"></div>
<div class="card">
    <div class="parent">
        <div class="div1">ID:</div>
        <div class="div2">{{$user->id}}</div>
        <div class="div3">種別：</div>
        <div class="div4">
            @if($user->class_id === 1)
            購入者
            @endif
        
            @if($user->class_id === 2)
            出品者
            @endif
        
            @if($user->class_id === 3)
            管理者
            @endif</div>
        <div class="div5">名前：</div>
        <div class="div6">{{$user->name}}</div>
        <div class="div7">編集</div>
        <div class="div8">削除</div>
    </div>
    </div>
@endforeach
</div>


@endsection