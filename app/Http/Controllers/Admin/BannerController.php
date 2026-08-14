<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * バナー一覧画面の表示
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * バナーの新規登録処理
     */
    public function store(Request $request)
    {
        // 1. バリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'url' => 'nullable|url|max:255',
        ]);

        // 2. 画像の保存処理 (storage/app/public/banners に保存)
        $path = $request->file('image')->store('banners', 'public');

        // 3. データベースへの保存
        Banner::create([
            'title' => $request->title,
            'image_path' => $path,
            'url' => $request->url,
        ]);

        return redirect()->route('admin.banners.index')
            ->with('success', 'バナーを登録しました。');
    }
}