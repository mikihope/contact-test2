@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <a href="{{ route('products.index') }}" style="text-decoration: none; color: #2196F3;">← 商品一覧に戻る</a>

    <div style="display: flex; margin-top: 20px; gap: 40px;">
        {{-- 左側：画像とファイル選択 --}}
        <div style="flex: 1; text-align: center;">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" 
                 style="width: 100%; max-width: 300px; border-radius: 10px; margin-bottom: 20px;">
            <input type="file" name="image" style="margin-top: 10px;">
        </div>

        {{-- 右側：フォーム内容 --}}
        <div style="flex: 1;">
            <form action="{{ route('products.update', $product->slug) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- 商品名 --}}
                <div style="margin-bottom: 20px;">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                        style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 値段 --}}
                <div style="margin-bottom: 20px;">
                    <label>値段</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}"
                        style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                    @error('price')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 季節 --}}
                <div style="margin-bottom: 20px;">
                    <label>季節</label><br>
                    @foreach($seasons as $season)
                        <label>
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                            {{ $season->name }}
                        </label>
                    @endforeach
                    @error('seasons')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 商品説明 --}}
                <div style="margin-bottom: 20px;">
                    <label>商品説明</label><br>
                    <textarea name="description"
                        style="width: 100%; height: 120px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ボタン群 --}}
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('products.index') }}"
                        style="background-color: #9e9e9e; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;">
                        戻る
                    </a>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit"
                            style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                            変更を保存
                        </button>

                        {{-- 削除ボタン --}}
                        <form action="{{ route('products.destroy', $product->slug) }}" method="POST"
                              onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background: #f44336; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                                🗑
                            </button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

