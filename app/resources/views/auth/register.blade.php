@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">会員登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="class_id">用途</label>
                  <input type="radio" class="" id="class_id" name="class_id" value="1">購入</input>
                  <input type="radio" class="" id="class_id" name="class_id" value="1">出品</input>
                  <input type="radio" class="" id="class_id" name="class_id" value="1">管理者</input>
              </div>

              <div class="form-group">
                <label for="name">氏名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>

              <div class="form-group">
                <label for="birth">生年月日</label>
                <input type="text" class="form-control" id="birth" name="birth" value="{{ old('birth') }}" />
              </div>

              <div class="tel">
                <label for="tel">電話番号</label>
                <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" />
              </div>

              <div class="form-group">
                <label for="address">住所</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" />
              </div>
              
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>

              <div class="form-group">
                  <label for="payment">支払い方法</label>
                  <input type="radio" class="" id="payment" name="payment" value="クレジットカード">クレジットカード</input>
                  <input type="radio" class="" id="payment" name="payment" value="代金引換">代金引換</input>
                  <input type="radio" class="" id="payment" name="payment" value="コンビニ支払い">コンビニ支払い</input>
                  <input type="radio" class="" id="payment" name="payment" value="後で追加する">後で追加する</input>

                  
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
