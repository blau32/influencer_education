<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| 画面分担2：ユーザー側（時間割）
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // UI-02-01: ユーザー＿時間割
    Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable.index');
});

/*
|--------------------------------------------------------------------------
| 画面分担2：管理者側機能
|--------------------------------------------------------------------------
*/
// UI-02-03: 管理＿ログイン
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);

// --------------------------------------------------------------------------
// 管理者機能グループ（※テスト動作確認のため一時的に middleware を外しています）
// 本番化時は Route::middleware(['auth', 'can:admin']) で囲んでください
// --------------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    // ログアウト処理（ルート名: admin.logout / URL: /admin/logout）
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // UI-02-04: 管理＿トップ
    Route::get('/top', function () {
        return view('admin.top');
    })->name('top');

    // UI-02-02: 管理＿新規ユーザー登録
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // ※ダミー用のユーザー一覧（画面遷移エラー回避用）
    Route::get('/users', function () {
        return 'ユーザー一覧画面';
    })->name('users.index');

    // UI-02-05: 管理＿バナー管理
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
});