<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 新規ユーザー登録画面の表示 (UI-02-02)
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * 新規ユーザー登録処理
     */
    public function store(Request $request)
    {
        // 1. 設計書に基づくバリデーション処理
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:1,2'],
        ], [
            // カスタムエラーメッセージ（任意）
            'name.required' => 'お名前を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しいメールアドレスの形式で入力してください。',
            'email.unique' => 'このメールアドレスは既に登録されています。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => '確認用パスワードと一致しません。',
            'role.required' => '権限区分を選択してください。',
        ]);

        // 2. DBへの登録処理（パスワードをハッシュ化）
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // 3. フラッシュメッセージを保持して管理トップへリダイレクト
        return redirect()->route('admin.top')->with('success', 'ユーザーを正常に登録しました。');
    }
}