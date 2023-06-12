@extends('productsapp')


@section('content')

<form action="{{ route('update',$products->id) }}" method="POST">

@csrf

<div class="title">
    <h1>商品情報編集</h1>
</div>

    <div class="body">
        <div class="products_detail">
            <input type="text" name="id" value="{{ $products->id }}"  placeholder="商品情報ID">
        </div>

        <div class="products_detail">
            <input type="text" name="product_name" value="{{ $products->product_name }}" placeholder="商品名">
        </div>

        <div class="products_detail">
            <select name="company_id" class="form-select">
                <option>{{ $products->company_name }}</option>
            </select>
        </div>
    
        <div class="products_detail">
            <input type="text" name="price" value="{{ $products->price }}" placeholder="価格">
        </div>

        <div class="products_detail">
            <input type="text" name="stock" value="{{ $products->stock }}" placeholder="在庫数">
        </div>

        <div class="products_detail">
            <textarea name="comment" value="{{ $products->comment }}" placeholder="コメント">{{ $products->comment }}</textarea>
        </div>
 
        <div class="products_detail">
            <input type="text" name="img" value="{{ $products->img_path }}" class="imgform">
            <input type="file" name="img_path" class="imgform">
        </div>
    </div>

    <div class="products-update">
        <button type="submit" class="btn btn-primary">{{ __('更新') }}</button>
    </div>

    <div class="back-to-prev">
        <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>
    </div>
</form>
@endsection

    