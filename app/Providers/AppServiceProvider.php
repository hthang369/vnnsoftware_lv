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
        $this->app->bind('App\Repositories\Company\CompanyRepositoryInterface', 'App\Repositories\Company\CompanyMysqlRepository');
        $this->app->bind('App\Repositories\Role\RoleRepositoryInterface', 'App\Repositories\Role\RoleMysqlRepository');
        $this->app->bind('App\Repositories\BusinessPlan\BusinessPlanRepositoryInterface', 'App\Repositories\BusinessPlan\BusinessPlanMysqlRepository');
        $this->app->bind('App\Repositories\FeatureApi\FeatureApiRepositoryInterface', 'App\Repositories\FeatureApi\FeatureApiMysqlRepository');
        $this->app->bind('App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface', 'App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiMysqlRepository');
        $this->app->bind('App\Repositories\TopMenu\TopMenuRepositoryInterface', 'App\Repositories\TopMenu\TopMenuMysqlRepository');
        $this->app->bind('App\Repositories\LeftMenu\LeftMenuRepositoryInterface', 'App\Repositories\LeftMenu\LeftMenuMysqlRepository');
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
