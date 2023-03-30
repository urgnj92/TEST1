@extends('productsapp')




@section('content')
    <div class="row">
        <div class="col-log-12">
            <div class="text-left">
                <h1>商品情報詳細</h1>
            </div>
        </div>
    </div>
    
    @foreach ($products as $product)
    
        <table class="table">
            <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->img_path }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
            </tr>
            </tbody>
        </table>


    
    
        @endforeach

        <div class = "col-12 mb-2 mt-2">
            <button type = "button" class = "btn btn-primary w-100" onclick="location.href=('products/edit') ">{{ __('編集') }}</button>
        </div>


        </div>
        <div class = "col-12 mb-2 mt-2">
            <button type = "button" onclick = "history.back()">{{ __('戻る') }}</button>
        </div>


@endsection

