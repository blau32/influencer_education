<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * UI-02-03: 管理＿ログイン画面表示
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * 管理＿ログイン処理
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.top'));
        }

        return back()->withErrors([
            'email' => 'ログインIDまたはパスワードが正しくありません。',
        ])->onlyInput('email');
    }

    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        // ログインセッションの破棄とトークンの再生成
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}