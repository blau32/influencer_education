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
    // ログインページ
    // Route::get('/login',[User\LoginController::class, 'showLoginForm'])->name('show.login');

    // 登録ページ
    // Route::get('/register',[User\RegisterController::class, 'showRegisterForm'])->name('show.register');

    //トップページ
    // Route::get('/top',[User\TopController::class, 'showTop'])->name('show.top');

    // お知らせページ
    Route::get('/article/{id}',[User\ArticleController::class, 'showArticle'])->name('show.article');

    // 時間割ページ
    Route::get('/curriculum_list',[User\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum');

    // 配信ページ
    // Route::get('/delivery/{id}',[User\DeliveryController::class, 'showDelivery'])->name('show.delivery');

    // 授業進捗ページ
    Route::get('/progress',[User\ProgressController::class, 'showProgress'])->name('show.progress');

    // プロフィール設定ページ
    Route::get('/profile',[User\ProfileController::class, 'showProfileForm'])->name('show.profile');

    // パスワード変更ページ
    // Route::get('/password',[User\PasswordController::class, 'showPasswordForm'])->name('show.password.edit');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    // Route::get('/login',[Admin\LoginController::class, 'showLoginForm'])->name('show.login');
    // Route::get('/register',[Admin\RegisterController::class, 'showRegisterForm'])->name('show.register');
    // Route::get('/top',[Admin\TopController::class, 'showTop'])->name('show.top');
    // Route::get('/curriculum_list',[Admin\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum_list');
    // Route::get('/curriculum_create',[Admin\CurriculumController::class, 'showCurriculumCreate'])->name('show.curriculum_create');
    // Route::get('/curriculum_edit/{id}',[Admin\CurriculumController::class, 'showCurriculumEdit'])->name('show.curriculum');
    // Route::get('/delivery_edit/{id}',[Admin\DeliveryController::class, 'showDeliveryEdit'])->name('show.delivery_edit');
    Route::get('/article_list',[Admin\ArticleController::class, 'showArticleList'])->name('show.article_list');
    Route::get('/article_create',[Admin\ArticleController::class, 'showArticleCreate'])->name('show.article_create');
    Route::get('/article_edit/{id}',[Admin\ArticleController::class, 'showArticleEdit'])->name('show.article_edit');
    // Route::get('/banner_edit',[Admin\BannerController::class, 'showBannerEdit'])->name('show.banner_edit');
    });
