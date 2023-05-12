@extends('productsapp')


@section('content')
    <div class="row">
        <div class="col-log-12">
            <div class="text-left">
                <h1>商品情報詳細</h1>
            </div>
        </div>
    </div>

    <div class="col-log-12">
        @foreach ($products as $product)
        <div class="form-group">
            {{ $product->id }}
        </div>
        
        <div>    
        {{ $product->img_path }}
        </div>

        <div>
            {{ $product->product_name }}
        </div>

        <div>
            {{ $product->company_name }}
        </div>

        <div>
            {{ $product->price }}
        </div>
        
        <div>
            {{ $product->stock }}
        </div>

        <div>
            {{ $product->comment }}
        </div>
        @endforeach
    </div>

        <div class="col-12 mb-2 mt-2">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('products.edit', $product->id) }}'">{{ __('編集') }}</button>
        </div>


        <div class="col-12 mb-2 mt-2">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
        </div>


@endsection

