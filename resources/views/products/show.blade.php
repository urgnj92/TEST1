@extends('productsapp')
@section('content')
<div class="container">
    <h2 class="title">商品情報詳細</h2>
        <div id="body"class="wrapper">
            <section id="products_detail">
                <p>{{ $products->id }}</p>
                <p>
                    @if ($products->img_path)
                    <img src="{{ asset('storage/public/'. $products->img_path) }}" alt="Product Image" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                </p>
                <p>{{ $products->product_name }}</p>
                <p>{{ $products->company_name }}</p>
                <p>{{ $products->price }}</p>
                <p>{{ $products->stock }}</p>
                <p>{{ $products->comment }}</p>
                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('edit', $products->id) }}'">{{ __('編集') }}</button>
                <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>
            </section>
        </div>
</div>
@endsection

