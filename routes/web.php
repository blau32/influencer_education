<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->namespace('User')->name('user.')->group(function () {

    // ログイン（未ログインでもアクセス可能）
    Route::get('/login', [User\LoginController::class, 'showLoginForm'])->name('show.login');

    // 登録
    // Route::get('/register',[User\RegisterController::class, 'showRegisterForm'])->name('show.register');

    //トップページ
    // Route::get('/top',[User\TopController::class, 'showTop'])->name('show.top');

    // お知らせページ
    Route::get('/article/{id}', [User\ArticleController::class, 'showArticle'])->name('show.article');

    // 時間割ページ
    Route::get('/curriculum_list', [User\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum');

    // 配信ページ
    // Route::get('/delivery/{id}',[User\DeliveryController::class, 'showDelivery'])->name('show.delivery');

    // 授業進捗ページ
    Route::get('/progress', [User\ProgressController::class, 'showProgress'])->name('show.progress');

    // プロフィール設定ページ
    Route::get('/profile', [User\ProfileController::class, 'showProfileForm'])->name('show.profile');

    // プロフィール更新
    Route::post('/profile', [User\ProfileController::class, 'updateProfile'])->name('update.profile');

    // パスワード変更ページ
    Route::get('/password', [User\ProfileController::class, 'showPasswordForm'])->name('show.password.edit');

    // パスワード更新
    Route::post('/password', [User\ProfileController::class, 'updatePassword'])->name('update.password');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    // Route::get('/login',[Admin\LoginController::class, 'showLoginForm'])->name('show.login');
    // Route::get('/register',[Admin\RegisterController::class, 'showRegisterForm'])->name('show.register');
    Route::get('/top',[Admin\TopController::class, 'showTop'])->name('show.top');
    // Route::get('/curriculum_list',[Admin\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum_list');
    // Route::get('/curriculum_create',[Admin\CurriculumController::class, 'showCurriculumCreate'])->name('show.curriculum_create');
    // Route::get('/curriculum_edit/{id}',[Admin\CurriculumController::class, 'showCurriculumEdit'])->name('show.curriculum');
    // Route::get('/delivery_edit/{id}',[Admin\DeliveryController::class, 'showDeliveryEdit'])->name('show.delivery_edit');

    // お知らせ一覧
    Route::get('/article_list', [Admin\ArticleController::class, 'showArticleList'])->name('show.article_list');

    // お知らせ変更
    Route::get('/article_edit/{id}', [Admin\ArticleController::class, 'showArticleEdit'])->name('show.article_edit');

    // お知らせ更新
    Route::post('/article_edit', [Admin\ArticleController::class, 'updateArticle'])->name('update.article');

    // お知らせ新規登録
    Route::get('/article_create', [Admin\ArticleController::class, 'showArticleCreate'])->name('show.article_create');
    // Route::get('/banner_edit',[Admin\BannerController::class, 'showBannerEdit'])->name('show.banner_edit');
});
