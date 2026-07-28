<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.index'); // 例: 一覧画面の表示
    }

    public function store(Request $request)
    {
        // 登録処理
    }
}
