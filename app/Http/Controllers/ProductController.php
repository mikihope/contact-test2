<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 商品一覧ページ
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 商品詳細ページ
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    // 商品登録画面（新規作成）
    public function create()
    {
        $seasons = Season::all();
        return view('products.create', compact('seasons'));
    }

    public function store(\App\Http\Requests\ProductRequest $request)
{
    // 画像アップロード
    if ($request->hasFile('image')) {
        $imageName = Str::random(40) . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);
    } else {
        $imageName = null;
    }

    // slug（日本語対応・空防止）
    $slug = Str::slug($request->name, '-');
    if (empty($slug)) {
        $slug = Str::random(8); // ✅ ここが超重要！
    }

    // 商品登録
    $product = \App\Models\Product::create([
        'name' => $request->name,
        'slug' => $slug,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    // 季節を中間テーブルに保存
    $product->seasons()->sync($request->seasons ?? []);

    return redirect()
        ->route('products.index')
        ->with('success', '商品を登録しました！');
    }

    // 商品編集画面
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $seasons = Season::all();
        return view('products.edit', compact('product', 'seasons'));
    }

    // 商品更新処理
    public function update(ProductRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // 画像が再アップロードされた場合
        if ($request->hasFile('image')) {
            // 古い画像を削除
            if ($product->image && Storage::disk('public')->exists('images/' . $product->image)) {
                Storage::disk('public')->delete('images/' . $product->image);
            }
            // 新しい画像を保存
            $path = $request->file('image')->store('images', 'public');
            $product->image = basename($path);
        }

        // 更新
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $product->seasons()->sync($request->seasons ?? []);

        return redirect()->route('products.show', $product->slug)->with('success', '商品情報を更新しました！');
    }

    // 商品削除処理
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // 画像削除
        if ($product->image && Storage::disk('public')->exists('images/' . $product->image)) {
            Storage::disk('public')->delete('images/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', '商品を削除しました');
    }
}

