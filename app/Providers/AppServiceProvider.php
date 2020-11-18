<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\User\UserRepositoryInterface', 'App\Repositories\User\UserMysqlRepository');
        $this->app->bind('App\Repositories\Role\RoleRepositoryInterface', 'App\Repositories\Role\RoleMysqlRepository');
        $this->app->bind('App\Repositories\BusinessPlan\BusinessPlanRepositoryInterface', 'App\Repositories\BusinessPlan\BusinessPlanMysqlRepository');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
