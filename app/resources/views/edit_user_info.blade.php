@extends('layouts.layout')
@section('content')
<div class="page_title">登録情報編集</div>
<div class="row justify-content-center">
  <div class="col col-md-offset-3 col-md-6">

  
    <nav class="card mt-5">
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
            @endforeach
          </div>
        @endif
        <form action="" method="POST">
          @csrf
        

          <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
          </div>

          <div class="form-group">
            <label for="birth">生年月日</label>
            <input type="text" class="form-control" id="birth" name="birth" value="{{ $user->birth }}" />
          </div>

          <div class="tel">
            <label for="tel">電話番号</label>
            <input type="text" class="form-control" id="tel" name="tel" value="{{ $user->tel }}" />
          </div>

          <div class="form-group">
            <label for="address">住所</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" />
          </div>
          
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" />
          </div>
          

          <div class="form-group">
              <label for="payment">支払い方法</label>
              <input type="radio" class="" id="payment" name="payment" value="クレジットカード">クレジットカード</input>
              <input type="radio" class="" id="payment" name="payment" value="代金引換">代金引換</input>
              <input type="radio" class="" id="payment" name="payment" value="コンビニ支払い">コンビニ支払い</input>
              <input type="radio" class="" id="payment" name="payment" value="後で追加する">後で追加する</input>

              
          </div>
          <div class="d-flex justify-content-center mt-3">
              <a href="{{ route('exe_edit_user') }}">
            <button type="submit" class="btn btn-primary">送信</button>
          </div>
        </form>
      </div>
    </nav>
  </div>
</div>

@endsection