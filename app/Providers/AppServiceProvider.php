<?php

namespace App\Providers;
use LaravelWebauthn\Services\Webauthn;
use Illuminate\Support\ServiceProvider;

use App\Http\Responses\LoginViewResponse;
use App\Http\Responses\RegisterViewResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

            Webauthn::loginViewResponseUsing(LoginViewResponse::class);
            Webauthn::registerViewResponseUsing(RegisterViewResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
