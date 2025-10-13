@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 40px auto;">

    <!-- ページタイトル -->
    <h1 style="text-align: center; margin-bottom: 30px;">商品一覧</h1>

    <!-- 検索フォーム -->
    <form action="{{ route('products.index') }}" method="GET" style="text-align: center; margin-bottom: 20px;">
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="商品名で検索"
            style="padding: 8px; width: 250px; border-radius: 5px; border: 1px solid #ccc;">
        <button type="submit"
            style="padding: 8px 16px; background-color: #ff6b81; color: white; border: none; border-radius: 5px; cursor: pointer;">
            検索
        </button>

        <select name="order" onchange="this.form.submit()" style="margin-left: 10px; padding: 8px; border-radius: 5px;">
            <option value="">並び替え</option>
            <option value="high" {{ (isset($order) && $order === 'high') ? 'selected' : '' }}>高い順</option>
            <option value="low" {{ (isset($order) && $order === 'low') ? 'selected' : '' }}>低い順</option>
        </select>
    </form>

    <!-- 商品一覧 -->
    <div class="products" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
        @foreach ($products as $product)
            <div class="product" style="border: 1px solid #ccc; border-radius: 10px; padding: 15px; text-align: center;">
                <a href="{{ route('products.show', $product->slug) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                        style="width: 100%; height: 150px; object-fit: cover; border-radius: 10px;">
                    <h2 style="margin: 10px 0;">{{ $product->name }}</h2>
                    <p style="color: #555;">価格：{{ number_format($product->price) }}円</p>
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection

