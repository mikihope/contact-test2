<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ログイン画面だけFortifyに教える（登録は使わない）
        Fortify::loginView(function () {
            return view('auth.login');
        });
    }
}
