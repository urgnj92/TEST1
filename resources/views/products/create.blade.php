@extends('productsapp')
@section('content')
<div class="title">
    <h1>商品新規登録画面</h1>
</div>

<div class="body">
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        
        <section id="form-group" class="wrapper">
            <dl>
                <dt>    
                    <label for="product_name">商品名</label>
                    <dd>
                        <input type="text" class="form_control" id="product_name" name="product_name" value="{{ old('product_name') }}">
                    </dd>
                </dt>
                
                <dt>
                    <label for="company_id">メーカー名</label>
                    <dd>
                        <select class="form-select" id="company_id" name="company_id" value="{{ old('company_id') }}">
                        <option>メーカー名を選択してください</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </dd>
                </dt>
                
                <dt>
                    <label for="price">価格</label>
                    <dd>
                        <input type="text" class="form_control" id="price" name="price" value="{{ old('price') }}">
                    </dd>
                </dt>
                
                <dt>
                    <label for="stock">在庫数</label>
                    <dd>
                        <input type="text" class="form_control" id="stock" name="stock" value="{{ old('stock') }}">
                    </dd>
                </dt>

                <dt>
                    <label for="comment">コメント</label>
                    <dd>
                        <textarea id="comment" name="comment" >{{ old('comment') }}</textarea>
                    </dd>
                </dt>

                <dt>
                    <label for="img_path">商品画像</label>
                    <dd>
                        <input type="file" class="form_control" name="img" id="img">
                    </dd>
                </dt>
            </dl>
        </section>

        <button class="btn btn-primary" type="submit">{{ __('登録') }}</button>

        <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>

    </form>
</div>



@endsection