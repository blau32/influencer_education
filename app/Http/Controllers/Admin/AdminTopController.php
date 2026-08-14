<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTopController extends Controller
{
    public function index()
    {
        // ログイン中の管理者情報を取得
        $user = Auth::user();

        return view('admin.admin_top', compact('user'));
    }
}