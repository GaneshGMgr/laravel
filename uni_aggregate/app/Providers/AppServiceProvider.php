<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
// use League\Flysystem\Config;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        // $google = DB::table('auth_providers')->where('name', 'google')->first();

        // if ($google) {


        //     Config::set('services.google.client_id', $google->client_id);
        //     Config::set('services.google.client_secret', $google->client_secret);
        //     Config::set('services.google.redirect', $google->redirect);
        // }
    }
}
