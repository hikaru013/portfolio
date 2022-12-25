@extends('layouts.layout')
@section('content')
<title>ログイン</title>

<body class="text-center">
@if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
        <h1 class="page_title h3 mt-2 mb-3 font-weight-normal">ログイン</h1>
        <form class="w-25 mx-auto" action="{{ route('login') }}" method="POST">
        @csrf
           	<label for="username" class="sr-only"></label>
           	<input class="form-control" id="email"
           			type="text" name="email" placeholder="メールアドレス" 
           			required autofocus/>
           	<label for="password" class="sr-only"></label>
           	<input class="form-control" id="password"
           			type="password" name="password" placeholder="パスワード" 
           			required/>
           	<input class="btn btn-primary outline my-1" type="submit" value="ログイン"/>
        </form>

        <div class="login_command">
            <div class="create_account">
                <a href="{{ route('create_account') }}">新規会員登録</a>
            </div>

            <div class="forgot_password">
                <a href="{{ route('password.request') }}">パスワードリセット</a>
            </div>
        </div>
</body>
@endsection