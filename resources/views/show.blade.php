@extends('productsapp')


@section('content')
<div class="title">
    <h1>商品情報詳細</h1>
</div>

    <div class="body">
        <div class="products_detail">{{ $products->id }}</div>
        
        <div class="products_detail">{{ $products->img_path }}</div>

        <div class="products_detail">{{ $products->product_name }}</div>

        <div class="products_detail">{{ $products->company_name }}</div>

        <div class="products_detail">{{ $products->price }}</div>
        
        <div class="products_detail">{{ $products->stock }}</div>

        <div class="products_detail">{{ $products->comment }}</div>
    </div>

        <div class="edit-products">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('products.edit', $products->id) }}'">{{ __('編集') }}</button>
        </div>

        <div class="back-to-prev">
            <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>
        </div>


@endsection

