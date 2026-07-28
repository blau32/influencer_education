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
            // URLが /admin から始まる場合は「管理者ログイン画面」へリダイレクト
            if ($request->is('admin*')) {
                return route('admin.login');
            }

            // それ以外（一般ユーザー領域）は「一般ログイン画面」へリダイレクト
            return route('login');
        }
    }
}