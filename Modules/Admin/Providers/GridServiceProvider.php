<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class GridServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Modules\Admin\Grids\PostsGridInterface', 'Modules\Admin\Grids\PostsGrid');
        $this->app->bind('Modules\Admin\Grids\CategoriesGridInterface', 'Modules\Admin\Grids\CategoriesGrid');
        $this->app->bind('Modules\Admin\Grids\PagesGridInterface', 'Modules\Admin\Grids\PagesGrid');
        $this->app->bind('Modules\Admin\Grids\AdvertisesGridInterface', 'Modules\Admin\Grids\AdvertisesGrid');
        $this->app->bind('Modules\Admin\Grids\SlidesGridInterface', 'Modules\Admin\Grids\SlidesGrid');
        $this->app->bind('Modules\Admin\Grids\RolesGridInterface', 'Modules\Admin\Grids\RolesGrid');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
