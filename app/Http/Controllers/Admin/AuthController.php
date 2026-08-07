<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest; // FormRequestの読み込みを追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 管理者ログイン画面の表示 (UI-02-03)
     */
    public function showLoginForm()
    {
        // 既にログイン済み（かつ管理者権限）の場合はトップ画面へリダイレクト
        if (Auth::check() && Auth::user()->role === 1) {
            return redirect()->route('admin.top');
        }

        return view('admin.login');
    }

    /**
     * ログイン実行処理
     */
    public function login(LoginRequest $request) // FormRequestに変更してバリデーションを分離
    {
        $credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
            'role'     => 1, // 管理者権限（role = 1）のみログイン許可
        ];

        // 認証処理
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.top');
        }

        // 認証失敗時
        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'login_error' => 'メールアドレスまたはパスワードが正しくありません。',
            ]);
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