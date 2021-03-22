<?php

namespace Modules\Core\Repositories;

use Modules\Core\Contracts\DataTransformer;
use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;

/**
 * Class BaseRepositoryEloquent.
 *
 * @package namespace Modules\Core\Repositories;
 */
abstract class BaseRepositoryEloquent extends PrettusBaseRepository implements BaseRepository
{
    /**
     * $var service;
     */
    protected $service;
    
    /**
     * $var grid;
     */
    protected $dataGrid;

    /**
     * $var form;
     */
    protected $formData;

    /**
     * Specify Service class name
     *
     * @return string
     */
    public function service()
    {
        return null;
    }
    
    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return null;
    }
    
    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return null;
    }

    /**
     * @param null $service
     *
     * @return mixin
     * @throws RepositoryException
     */
    public function makeService($service = null)
    {
        $serviceClass = $service ?: $this->service();

        if (!is_null($serviceClass)) {
            $this->service = is_string($serviceClass) ? $this->app->make($serviceClass) : $serviceClass;
        }

        return $this->service;
    }
    
    /**
     * @param null $grid
     *
     * @return mixin
     * @throws RepositoryException
     */
    public function makeDataGrid($grid = null)
    {
        $gridClass = $grid ?: $this->grid();

        if (!is_null($gridClass)) {
            $this->dataGrid = is_string($gridClass) ? $this->app->make($gridClass) : $gridClass;
        }

        return $this->dataGrid;
    }
    
    /**
     * @param null $form
     *
     * @return mixin
     * @throws RepositoryException
     */
    public function makeFormData($form = null)
    {
        $formClass = $form ?: $this->form();

        if (!is_null($formClass)) {
            $this->formData = is_string($formClass) ? $this->app->make($formClass) : $formClass;
        }

        return $this->formData;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->makeService();
        $this->makeDataGrid();
        $this->makeFormData();
    }

    public function unguard()
    {
        $this->model::unguard();
    }

    public function reguard()
    {
        $this->model::reguard();
    }

    public function allDataGrid()
    {
        if ($this->dataGrid) {
            return $this->dataGrid->create([
                'query' => $this->getQuery(),
                'request' => request()
            ]);
        }
        return null;
    }

    protected function getQuery()
    {
        $this->applyCriteria();
        $this->applyScope();

        $results = $this->model::query();

        $this->resetModel();
        $this->resetScope();

        return $results;
    }

    public function formGenerate($route, $actionName, $config = [])
    {
        $modal = [
            'model' => class_basename($this->model()),
            'route' => $route,
            'action' => $actionName,
            'pjaxContainer' => request()->get('ref'),
        ];

        $modal = array_merge($modal, $config);

        return [$modal, $this->form()];
    }

    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        if (is_null($limit)) {
            $limit = request()->query('limit', 0);
        }

        return parent::paginate($limit, $columns, $method);
    }

    public function paginateAndTransform(DataTransformer $paginationTransformer, $limit = null, $columns = ['*'], $method = "paginate")
    {
        $paginatedData = $this->paginate($limit, $columns, $method);

        return $paginationTransformer->transform($paginatedData);
    }

    public function getCreatedUpdatedUser()
    {
        $data[] = $this->model::getUpdatedUser();
        if(!$this->model->exists) array_unshift($data, $this->model::getCreatedUser());
        return array_fill_keys($data, $this->model->getAuthUser());
    }
}
