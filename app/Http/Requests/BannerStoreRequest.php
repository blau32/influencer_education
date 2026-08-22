<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // 管理者権限（role = 1）のチェック
        return auth()->check() && auth()->user()->role === 1;
    }

    public function rules(): array
    {
        return [
            // 必須、1〜100文字
            'title'        => ['required', 'string', 'min:1', 'max:100'],
            // 必須、上限5MB (5,120KB)、指定拡張子
            'image_path'   => ['required', 'file', 'image', 'mimes:png,jpg,jpeg,gif,webp', 'max:5120'],
            // 必須、URL形式（http:// または https://）、最大2048桁
            'redirect_url' => ['required', 'url', 'max:2048'],
            // 必須、1〜999の半角整数
            'sort_order'   => ['required', 'integer', 'between:1,999'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'バナータイトルを入力してください。',
            'title.max'             => 'バナータイトルは100文字以内で入力してください。',
            'image_path.required'   => 'バナー画像をアップロードしてください。',
            'image_path.max'        => '画像サイズは5MB以下にしてください。',
            'image_path.mimes'      => '画像形式は png, jpg, jpeg, gif, webp のみ対応しています。',
            'redirect_url.required' => '遷移先URLを入力してください。',
            'redirect_url.url'      => '正しいURL形式（http:// または https:// で始まる形式）で入力してください。',
            'sort_order.between'    => '表示順は1〜999の数値で入力してください。',
        ];
    }
}