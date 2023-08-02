@extends('productsapp')


@section('content')
<div class="title">
    <h1>商品新規登録画面</h1>
</div>

<div class="body">
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="text" class="form_control" id="product_name" name="product_name" value="{{ old('product_name') }}">
        </div>   


        <div class="form-group">
            <label for="company_id">メーカー名</label>
            <select class="form-select" id="company_id" name="company_id" value="{{ old('company_id') }}">
            <option>メーカー名を選択してください</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="price">価格</label>
            <input type="text" class="form_control" id="price" name="price" value="{{ old('price') }}">
        </div>   


        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="text" class="form_control" id="stock" name="stock" value="{{ old('stock') }}">
        </div> 
        

        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea class="form-control" id="comment" name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
        </div> 
    
        
        <div class="form-group">
            <label for="img_path">商品画像</label>
            <input type="file" class="form_control" name="img" id="img">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>

        <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>

    </form>
</div>



@endsection