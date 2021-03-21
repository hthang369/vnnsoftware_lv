<?php

namespace Modules\Core\Plugins\VueTables;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Contracts\PaginationTransformer;
use Modules\Core\Repositories\BaseCriteriaEloquent;
use Prettus\Repository\Contracts\CriteriaInterface;

class VueTablesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving(CriteriaInterface::class, function ($criteria, $app) {
            $vueTablesRequest = app(VueTablesRequestAdapter::class);
            /** @var BaseCriteriaEloquent $criteria */
            $criteria->setFilter($vueTablesRequest->getFilter());
            $criteria->setSort($vueTablesRequest->getSort());
        });
        $this->app->bind(PaginationTransformer::class, VueTablesPaginationTransformer::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
