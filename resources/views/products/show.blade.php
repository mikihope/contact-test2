@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; background-color: #fafafa; padding: 40px; border-radius: 10px;">
    <a href="{{ route('products.index') }}" style="color: #007bff; text-decoration: none;">商品一覧</a> ＞ {{ $product->name }}

    <div style="display: flex; margin-top: 30px; gap: 50px;">
        {{-- 左：画像 --}}
        <div style="flex: 1;">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; max-width: 400px; border-radius: 10px;">
            <div style="margin-top: 10px;">
                <input type="file" name="image" id="image">
                <p style="font-size: 12px; color: #777;">{{ $product->image }}</p>
            </div>
        </div>

        {{-- 右：情報 --}}
        <div style="flex: 1;">
            <div style="margin-bottom: 20px;">
                <label>商品名</label><br>
                <input type="text" value="{{ $product->name }}" readonly
                    style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>値段</label><br>
                <input type="text" value="{{ $product->price }}" readonly
                    style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>季節</label><br>
                <label><input type="checkbox" disabled {{ $product->seasons->contains('name', '春') ? 'checked' : '' }}> 春</label>
                <label><input type="checkbox" disabled {{ $product->seasons->contains('name', '夏') ? 'checked' : '' }}> 夏</label>
                <label><input type="checkbox" disabled {{ $product->seasons->contains('name', '秋') ? 'checked' : '' }}> 秋</label>
                <label><input type="checkbox" disabled {{ $product->seasons->contains('name', '冬') ? 'checked' : '' }}> 冬</label>
            </div>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <label>商品説明</label><br>
        <textarea readonly
            style="width: 100%; height: 120px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">{{ $product->description }}</textarea>
    </div>

    <div style="margin-top: 40px; text-align: center;">
        <a href="{{ route('products.index') }}" 
           style="background-color: #ccc; padding: 10px 30px; border-radius: 5px; text-decoration: none; color: black; margin-right: 20px;">
           戻る
        </a>

        <a href="{{ route('products.edit', $product->id) }}" 
           style="background-color: #FFD700; padding: 10px 30px; border-radius: 5px; text-decoration: none; color: black; margin-right: 20px;">
           変更を保存
        </a>

        <form action="{{ route('products.destroy', $product->slug) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                style="background:none; border:none; color:red; font-size:20px; cursor:pointer;">
                🗑
            </button>
        </form>
    </div>
</div>
@endsection

