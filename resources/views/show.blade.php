@extends('productsapp')




@section('content')
<form action="{{ route('products.update') }}" mathod="POST">
    <div class="row">
        <div class="col-log-12">
            <div class="text-left">
                <h1>商品情報詳細</h1>
            </div>
        </div>
    </div>
    
    @foreach ($products as $product)


    <div class="col-log-12">
        <div class="text-left">
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
    </div>

    @endforeach


    
        <div class="col-12 mb-2 mt-2">
            <button type="button" class="btn btn-primary w-100" onclick="location.href='edit'">{{ __('編集') }}</button>
        </div>


        </div>
        <div class="col-12 mb-2 mt-2">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
        </div>

</form>

@endsection

