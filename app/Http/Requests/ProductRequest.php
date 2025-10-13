<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * 権限チェック（誰でもOK）
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0|max:10000',
            'seasons' => 'required|array|min:1',
            'description' => 'required|string|max:120',
            'image' => [
                'required',
                'file',
                function ($attribute, $value, $fail) {
                    if ($value && !in_array(strtolower($value->getClientOriginalExtension()), ['png', 'jpeg', 'jpg'])) {
                        $fail('「.png」または「.jpeg」形式でアップロードしてください');
                    }
                },
            ],
        ];
    }


    /**
     * 日本語のエラーメッセージ
     */
    public function messages(): array
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' => '数値で入力してください',
            'price.min' => '0~10000円以内で入力してください',
            'price.max' => '0~10000円以内で入力してください',
            'seasons.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
        ];
    }
}

