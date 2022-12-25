
@extends('layouts.layout')

@section('content')
<style>
    .imagePreview {
        width: 100%;
        height: 100px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
</style>

<main>
<div class="page_title">出品</div>
@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
<div class="register_product">
    
        <!-- 左側 -->
            <div class="container">

                <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- プレビュー -->
                    <div class="imagePreview" style="height:250px"></div>
                    
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Choose File<input type="file" style="display:none" name="file[]" class="uploadFile">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly="">
                    </div>

                    <div class="d-inline-flex">

                        <div class=col>
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="file[]"  class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                        </div>

                        <div class=col>
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="file[]" class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                        </div>

                        <div class=col>
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="file[]"  class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>

                
            </div>
        <!-- 右側 -->

        <div class="container">
        <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>

              <div class="form-group">
                <label for="price">販売金額</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" />
              </div>

              <div class="form-group">
                <label for="stock">在庫</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" />
              </div>

              <div class="form-group">
                <label for="sex">性別</label>
                <input type="radio" class="" id="sex" name="sex" value="男"{{ old('sex')==='男' ? 'checked' : ''}}>メンズ</input>
                <input type="radio" class="" id="sex" name="sex" value="女"{{ old('sex')==='女' ? 'checked' : ''}}>レディース</input>
                <input type="radio" class="" id="sex" name="sex" value="フリー"{{ old('sex')==='フリー' ? 'checked' : ''}}>フリー</input>
              </div>

              <div class="form-group">
                <label for="size">サイズ</label>
                <input type="radio" class="" id="size" name="size" value="S"{{ old('size')==='S' ? 'checked' : ''}}>S</input>
                <input type="radio" class="" id="size" name="size" value="M"{{ old('size')==='M' ? 'checked' : ''}}>M</input>
                <input type="radio" class="" id="size" name="size" value="L"{{ old('size')==='L' ? 'checked' : ''}}>L</input>
                <input type="radio" class="" id="size" name="size" value="F"{{ old('size')==='F' ? 'checked' : ''}}>F</input>
              </div>

              <div class="form-group">
                <label for="category">カテゴリ</label>
                <input type="radio" id="cateogry" name="category" value="トップス" {{ old('category')==='トップス' ? 'checked' : ''}}>トップス</input>
                <input type="radio" id="cateogry" name="category" value="アウター"{{ old('category')==='アウター' ? 'checked' : ''}}>アウター</input>
                <input type="radio" id="cateogry" name="category" value="パンツ"{{ old('category')==='パンツ' ? 'checked' : ''}}>パンツ</input>
                <input type="radio" id="cateogry" name="category" value="その他"{{ old('category')==='その他' ? 'checked' : ''}}>その他</input>
              </div>
        </div>
</div>
<div class="container">
            <div class="form-group">
                <label for="detail">商品説明</label>
                <textarea id="detail" name="detail" style="width:100%; height:80px;white-space: pre-wrap;" placeholder="商品サイズ等の説明を記載してください"></textarea>
              </div>
</div>

<div class='row justify-content-center'>
    <button type='submit'  onclick="return confirm('出品してよろしいですか？')" class='btn btn-primary w-25 mt-3'>商品を登録</button>
</div> 
        <!-- ないと画像プレビュー動作しない -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- なくても画像プレビュー動作する -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</form>
</main>
</html>
@endsection