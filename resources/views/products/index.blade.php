@extends('productsapp')

@section('content')
<div class="title">
    <h1>商品情報検索</h1>
</div>

<div class="search">
    <form action="{{ route('index') }}" method="GET">
        <input type="text" name="keyword" id="keyword" value="{{ $keyword }}" placeholder="商品名を入力してください">

    <select class="form-select" name="company_id" id="company_id" value="{{ ('company_id') }}">
        <option>{{ __('メーカー名を選択してください') }}</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->company_name }}</option>
        @endforeach
    </select>
    
    <button type="submit" class="btn btn-primary">{{ __('検索') }}</button>
    </form>
</div>

    <div class="body"> 
        <h2>商品情報一覧</h2>
        <button type="button" class="btn btn-primary" onclick="location.href=('create')">{{ __('新規登録') }}</button>
    </div>

    <table class="products-table">
        <thread>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th>作成日</th>
            <th>更新日</th>
            <th>詳細</th>
            <th>削除</th>
        </tr>
        </thread>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->img_path }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td><button type="button" class="btn btn-primary" onclick="location.href='{{ route('show', $product->id) }}'">
                {{ __('詳細') }}</button></td>
            
            <form action="{{ route('delete', $product->id) }}" method="POST">
            @csrf
                <td><input type="hidden" name="id" value="{{$product->id}}">
                <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('削除') }}</button></td>
            </form>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection