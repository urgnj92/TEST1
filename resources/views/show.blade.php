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
    </div>

    <div class="col-log-12">
        <div class="text-left">
            {{ $product->img_path }}
        </div>
    </div>

    <div class="col-log-12">
        <div class="text-left">
            {{ $product->product_name }}
        </div>
    </div>

    <div class="col-log-12">
        <div class="text-left">
            {{ $product->company_name }}
        </div>
    </div>

    <div class="col-log-12">
        <div class="text-left">
            {{ $product->price }}
        </div>
    </div>

    <div class="col-log-12">
        <div class="text-left">
            {{ $product->stock }}
        </div>
    </div>

    <div class="col-log-12">
        <div class="text-left">
            {{ $product->comment }}
        </div>
    </div>

    <div class="form-group">
        @if($product->id==$product->product_name){{ $product->company_name}}
        
        @endif
    </div>

    @endforeach

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            {{ $product->comment }}
        </div>
    </div>

        <div class="col-12 mb-2 mt-2">
            <button type="button" class="btn btn-primary w-100" onclick="location.href='edit'">{{ __('編集') }}</button>
        </div>


        </div>
        <div class="col-12 mb-2 mt-2">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
        </div>

</form>

@endsection

