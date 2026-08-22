<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // 認証・権限チェックはミドルウェアで行うため true に設定
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'role'     => ['required', 'integer', 'in:1,2'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => '氏名は必須です。',
            'email.required'     => 'メールアドレスは必須です。',
            'email.unique'       => '指定されたメールアドレスは既に登録されています。',
            'password.required'  => 'パスワードは必須です。',
            'password.min'       => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワード（確認）と一致していません。',
            'role.required'      => '権限の選択は必須です。',
        ];
    }
}