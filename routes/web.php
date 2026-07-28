<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;

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

// 管理者権限が必要なグループ
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
    // UI-02-04: 管理＿トップ
    Route::get('/top', function () {
        return view('admin.top');
    })->name('top');

    // UI-02-02: 管理＿新規ユーザー登録
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // UI-02-05: 管理＿バナー管理
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
});
Route::get('/', function () {
    return view('welcome');
});
