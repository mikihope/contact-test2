@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 50px auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

    <h2 style="text-align:center; margin-bottom:30px;">商品登録</h2>

    {{-- 戻るボタン --}}
    <div style="text-align:right; margin-bottom:20px;">
        <a href="{{ route('products.index') }}" style="background-color:#6c757d; color:white; padding:8px 20px; border-radius:5px; text-decoration:none;">戻る</a>
    </div>

    {{-- 登録フォーム --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 商品名 --}}
        <div style="margin-bottom:20px;">
            <label for="name">商品名</label><br>
            <input type="text" name="name" id="name" placeholder="商品名を入力"
                value="{{ old('name') }}"
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            @error('name')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        {{-- 値段 --}}
        <div style="margin-bottom:20px;">
            <label for="price">値段</label><br>
            <input type="number" name="price" id="price" placeholder="値段を入力"
                value="{{ old('price') }}"
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            @error('price')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        {{-- 季節 --}}
        <div style="margin-bottom:20px;">
            <label>季節</label><br>
            @foreach($seasons as $season)
                <label style="margin-right:15px;">
                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                        {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) ? 'checked' : '' }}>
                    {{ $season->name }}
                </label>
            @endforeach
            @error('seasons')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        {{-- 商品説明 --}}
        <div style="margin-bottom:20px;">
            <label for="description">商品説明</label><br>
            <textarea name="description" id="description" placeholder="商品の説明を入力"
                style="width:100%; height:120px; padding:10px; border:1px solid #ccc; border-radius:5px;">{{ old('description') }}</textarea>
            @error('description')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        {{-- 商品画像 --}}
        <div style="margin-bottom:30px;">
            <label for="image">商品画像</label><br>
            <input type="file" name="image" id="image" style="margin-top:10px;">
            @error('image')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        {{-- ボタン --}}
        <div style="text-align:center;">
            <button type="submit"
                style="background-color:#28a745; color:white; border:none; padding:10px 25px; border-radius:5px; cursor:pointer;">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
