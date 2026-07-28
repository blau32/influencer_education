<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 管理者ログイン画面の表示 (UI-02-03)
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * ログイン実行処理
     */
    public function login(Request $request)
    {
        // 1. バリデーション
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しいメールアドレスの形式で入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ]);

        // 2. 認証処理（管理者権限 role = 2 のユーザーのみログインを許可する場合）
        if (Auth::attempt(array_merge($credentials, ['role' => 2]))) {
            $request->session()->regenerate();
            
            // 管理トップへリダイレクト
            return redirect()->intended(route('admin.top'));
        }

        // 3. 認証失敗時
        return back()->withErrors([
            'email' => 'ログイン情報が正しくないか、管理者権限がありません。',
        ])->onlyInput('email');
    }

    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}