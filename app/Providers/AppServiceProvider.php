<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; 
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 🔑 admin (管理者権限) のルールを定義 (role が 2 のユーザーを許可)
        Gate::define('admin', function (User $user) {
            return (int)$user->role === 1;
        });
    }
}