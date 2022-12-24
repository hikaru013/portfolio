@extends('layouts.layout')
@section('content')
<div class="page_title">登録情報編集</div>

<div class="row justify-content-center">

  <div class="col col-md-offset-3 col-md-6">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
    <nav class="card">
      <div class="card-body">
      

        <form action="{{ route('exe_edit_user') }}" method="POST" enctype="multipart/form-data">
          @csrf
        
          @if(auth()->user()->class_id ===2 ||auth()->user()->class_id ===3)
          <div class="imagePreview mx-auto text-center" style="background-size:250px;height:250px;width:250px; padding-bottom:15px;">
            <img class="" src="{{$file->path}}" style="width:250px">
          </div>

          <div class="input-group mx-auto" style="padding-top:10px;width:65%;">
              <label class="input-group-btn">
                  <span class="btn btn-primary">
                      Choose File<input type="file" style="display:none" name="file" class="uploadFile">
                  </span>
              </label>
              <input type="text" class="form-control" readonly="">
          </div>
          @endif

          <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
          </div>

          <div class="form-group">
            <label for="birth">生年月日</label>
            <input type="text" placeholder="YYYYMMDD"class="form-control" id="birth" name="birth" value="{{ $user->birth }}" />
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
              <input type="radio" class="" id="payment" name="payment" value="クレジットカード"{{ old('payment', $user->payment)==="クレジットカード"?'checked':''}}>
                <label class="payment">クレジットカード</input></label>
              <input type="radio" class="" id="payment" name="payment" value="代金引換"{{ old('payment', $user->payment)==="代金引換"?'checked':''}}>
                <label class="payment">代金引換</input></label>
              <input type="radio" class="" id="payment" name="payment" value="コンビニ支払い"{{ old('payment', $user->payment)==="コンビニ支払い"?'checked':''}}></input>
                <label class="payment">コンビニ支払い</label>
              <input type="radio" class="" id="payment" name="payment" value="後で追加する"{{ old('payment', $user->payment)==="後で追加する"?'checked':''}}></input>
                <label class="payment">後で追加する</label>
          </div>

          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary" onclick="return confirm('登録してよろしいですか？')">編集保存</button>
          </div>

        </form>
      </div>
    </nav>
  </div>
</div>

@endsection