<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\BladeFunctions    ;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        Blade::if('employer', function () {
            return auth()->user() && auth()->user()->user_type == 2;
        });
        Blade::if('candidate', function () {
            return auth()->user() && auth()->user()->user_type == 1;
        });
    }
}
