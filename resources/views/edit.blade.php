@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 700px; margin: 50px auto;">

    <h2 style="text-align: center; margin-bottom: 30px;">商品詳細</h2>

    {{-- 商品画像 --}}
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ asset('images/' . $product->image) }}" 
             alt="{{ $product->name }}" 
             style="width: 250px; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
        <div>
            <label for="image" class="btn btn-outline-secondary">
                ファイルを選択
                <input type="file" id="image" name="image" style="display: none;">
            </label>
        </div>
    </div>

    {{-- フォーム --}}
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="text-align: center;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="name">商品名</label><br>
            <input type="text" id="name" name="name" value="{{ $product->name }}" style="width: 80%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price">価格</label><br>
            <input type="number" id="price" name="price" value="{{ $product->price }}" style="width: 80%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">説明文</label><br>
            <textarea id="description" name="description" rows="5" style="width: 80%; padding: 8px;">{{ $product->description }}</textarea>
        </div>

        {{-- 季節チェックボックス --}}
        <div style="margin-bottom: 20px;">
            <label>季節</label><br>
            @foreach ($seasons as $season)
                <label style="margin-right: 15px;">
                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                        {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>
                    {{ $season->name }}
                </label>
            @endforeach
        </div>

        {{-- ボタン類 --}}
        <div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>

            <button type="submit" class="btn btn-primary">変更を保存</button>

            {{-- ごみ箱アイコン（削除ボタン） --}}
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    🗑️
                </button>
            </form>
        </div>

    </form>
</div>
@endsection
