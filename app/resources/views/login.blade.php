@extends('layouts.layout')
@section('content')
<title>ログイン</title>

<body class="text-center">

        <h1 class="h3 mt-2 mb-3 font-weight-normal">ログイン</h1>
        <form class="w-25 mx-auto" th:action="@{/login}" method="post">
           	<label for="username" class="sr-only"></label>
           	<input class="form-control" id="username"
           			type="text" name="username" placeholder="メールアドレス" 
           			required autofocus/>
           	<label for="password" class="sr-only"></label>
           	<input class="form-control" id="password"
           			type="password" name="password" placeholder="パスワード" 
           			required/>
           	<input class="btn btn-outline-primary my-1" type="submit" value="ログイン"/>
        </form>

        <div class="login_command">
            <div class="create_account">
                <a href="{{ route('create_account') }}">新規会員登録</a>
            </div>

            <div class="forgot_password">
                <a href="{{ route('password_reset') }}">パスワードリセット</a>
            </div>
        </div>
</body>
@endsection