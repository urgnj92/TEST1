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
   
        <div class="form-group">
            {{ $products->id }}
        </div>
        
        <div>    
            {{ $products->img_path }}
        </div>

        <div>
            {{ $products->product_name }}
        </div>

        <div>
            {{ $products->company_name }}
        </div>

        <div>
            {{ $products->price }}
        </div>
        
        <div>
            {{ $products->stock }}
        </div>

        <div>
            {{ $products->comment }}
        </div>


    </div>

        <div class="col-12 mb-2 mt-2">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('products.edit', $products->id) }}'">{{ __('編集') }}</button>
        </div>


        <div class="col-12 mb-2 mt-2">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
        </div>


@endsection

