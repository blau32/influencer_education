<?php

namespace App\Http\Middleware;

Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 未ログイン または 管理者権限（role = 1）でない場合
        if (!Auth::check() || Auth::user()->role !== 1) {
            return redirect()->route('admin.login')->withErrors(['auth' => '管理者権限が必要です。']);
        }

        return $next($request);
    }
}