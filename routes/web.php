<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminTopController;

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
// UI-02-03: 管理＿ログイン（※ログイン前でもアクセスが必要なためグループ外）
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);

// --------------------------------------------------------------------------
// 管理者機能グループ（ミドルウェア適用済み）
// --------------------------------------------------------------------------
Route::prefix('admin')->middleware(['auth', 'can:admin'])->name('admin.')->group(function () {
    // ログアウト処理（ルート名: admin.logout）
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // UI-02-04: 管理＿トップ（ルート名: admin.top）
    Route::get('/top', [AdminTopController::class, 'index'])->name('top');

    // UI-02-02: 管理＿新規ユーザー登録（ルート名: admin.users.create / admin.users.store）
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // ※ダミー用のユーザー一覧（ルート名: admin.users.index）
    Route::get('/users', function () {
        return 'ユーザー一覧画面';
    })->name('users.index');

    // UI-02-05: 管理＿バナー管理（ルート名: admin.banners.index）
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');

    // ※ダミー用のお知らせ一覧（ルート名: admin.articles.index）
    Route::get('/articles', function () {
        return 'お知らせ一覧画面';
    })->name('articles.index');
});