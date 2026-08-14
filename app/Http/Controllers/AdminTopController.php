<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTopController extends Controller
{
    /**
     * 管理画面トップの表示
     */
    public function index()
    {
        // ログイン中の管理者ユーザー情報をセッションから取得 (users.id, users.name, users.role)
        $user = Auth::user();

        // Viewへ渡して共通ヘッダーおよびトップ画面を表示
        return view('admin_top', compact('user'));
    }
}