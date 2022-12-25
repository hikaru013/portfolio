@extends('layouts.layout')
@section('content')

@if(auth()->guest()||auth::user()->class_id===3)

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
                  <label for="class_id" style="font-size:14px;">用途</label>
                  <input type="radio" class="" id="class_id" name="class_id" value="1"><span style="font-size:16px">購入</span></input>
                  <input type="radio" class="" id="class_id" name="class_id" value="2"><span style="font-size:16px">出品</span></input>

                @auth
                @php $class_id=Auth::User()->class_id;@endphp
                @if($class_id === 3)
                  <input type="radio" class="" id="class_id" name="class_id" value="3"><span style="font-size:16px">管理者</span></input>
                @endif
                @endauth

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
                  <div>
                  <input type="radio" class="" id="payment" name="payment" value="クレジットカード">
                    <span style="font-size:16px">クレジットカード</input></span>
                  <input type="radio" class="" id="payment" name="payment" value="代金引換">
                    <span style="font-size:16px">代金引換</input></span>
                  <input type="radio" class="" id="payment" name="payment" value="コンビニ支払い">
                    <span style="font-size:16px">コンビニ支払い</input></span>
                  <input type="radio" class="" id="payment" name="payment" value="後で追加する">
                    <span style="font-size:16px">後で追加する</input></span>
                  </div>
                  
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
@endif
@endsection
