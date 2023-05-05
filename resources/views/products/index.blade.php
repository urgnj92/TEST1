@extends('productsapp')




@section('content')
<div class="top">
    <div class="col-log-12">
        <div class="text-left">
            <h1>商品情報検索</h1>
        </div>
<!-- 商品名の部分一致を行い、商品検索できるようにし、検索結果を表示する -->     
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">

            <form action="{{ route('products.index') }}" method="GET">
                <input type="search" name="keyword"  class="form-control" value= "" placeholder="商品名を入力してください">

            </div>

            <div>
                <select name="company_name" class="form-select">
                    <option>{{ __('メーカー名を選択してください') }}</option>

                @foreach ($companies as $company)

                <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>

                @endforeach

                </select>
            </div>

                <button type="submit" class="btn btn-primary" >{{ __('検索') }}</button>
                
            </form>
        </div>
</div>




    <div class="container">
        <div class="col-log-12">
            <div class="text-left">
                <h2>商品情報一覧</h2>
            </div>

                <button type="button" class="btn btn-primary" onclick="location.href=('create')">
                {{ __('新規登録') }}</button>
        </div>
    </div>

    <table class="table">
    <thread>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th>詳細</th>
            <th>削除</th>
        </tr>
    </thread>
    
    @foreach ($products as $product)

    <tbody>
        <tr>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">

            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_name }}</td>
            
            <!-- 詳細表示ボタンを押して商品ごとの詳細情報を表示 選択した商品IDへ飛ぶが404エラーが出る -->
            <td><button type="button" class="btn btn-primary" onclick="location.href='{{ route('products.show', $product->id) }}'">
            {{ __('詳細表示') }}</button></td>
            <td>
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>{{ __('削除') }}</button>
        </form>
        </td>
        </tr>
    </tbody>
    
        @endforeach

    </table>


@endsection

