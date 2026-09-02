<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * 未ログイン状態でアクセスされた際のリダイレクト先を取得
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // URLが /admin から始まる場合、または一般用ログインがない場合は管理者ログインへリダイレクト
            if ($request->is('admin*')) {
                return route('admin.login');
            }

            // 一般ユーザー用ログイン画面がない場合も、一旦管理者ログイン画面へ
            return route('admin.login'); // ← ここを route('login') から変更
        }
    }
}