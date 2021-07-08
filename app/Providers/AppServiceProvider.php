<?php

namespace App\Providers;

use App\Core\Support\QueryLogger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
        DB::connection()->enableQueryLog();
        // DB::listen(function($query) {
        //     QueryLogger::log($query);
        // });
    }
}
