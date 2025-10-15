{{-- resources/views/products/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品一覧</h1>

    {{-- ✅ 成功メッセージ --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ 検索フォーム --}}
    <form action="{{ route('products.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名で検索">
        <button type="submit">検索</button>
    </form>

    {{-- ✅ 並べ替えフォーム --}}
    <form action="{{ route('products.index') }}" method="GET" style="margin-bottom: 20px;">
        <select name="sort">
            <option value="">並べ替え</option>
            <option value="high" {{ request('sort') === 'high' ? 'selected' : '' }}>価格が高い順</option>
            <option value="low" {{ request('sort') === 'low' ? 'selected' : '' }}>価格が低い順</option>
        </select>
        <button type="submit">並べ替え</button>
    </form>

    {{-- ✅ 商品一覧 --}}
    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-card">
                {{-- 画像をクリックで詳細ページ --}}
                <a href="{{ route('products.show', $product->slug) }}">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                </a>
                <h3>{{ $product->name }}</h3>
                <p>価格: ¥{{ number_format($product->price) }}</p>
                <a href="{{ route('products.show', $product->slug) }}" class="detail-link">詳細を見る</a>
            </div>
        @endforeach
    </div>
</div>
@endsection

{{-- ✅ スタイル --}}
<style>
.container {
    width: 90%;
    max-width: 1000px;
    margin: 0 auto;
    text-align: center;
}

input[type="text"] {
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    background-color: #ffcc66;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    color: #333;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    background-color: #ffb84d;
}

.product-list {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* ✅ 3列表示 */
    gap: 20px;
    justify-items: center;
}

.product-card {
    background: #fff8ee;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    width: 250px;
}

.product-card img {
    border-radius: 10px;
}

.detail-link {
    display: inline-block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
}

.detail-link:hover {
    text-decoration: underline;
}
</style>

