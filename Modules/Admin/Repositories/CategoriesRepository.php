<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Forms\CategoriesForm;
use Modules\Admin\Grids\CategoriesGridInterface;

class CategoriesRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoriesModel::class;
    }
    
    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return CategoriesGridInterface::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return CategoriesForm::class;
    }

    public function create(array $attributes)
    {
        $attributes['category_status'] = 1;
        parent::create($attributes);
    }

    public function update(array $attributes, $id)
    {
        $attributes['category_status'] = 1;
        parent::update($attributes, $id);
    }

    // public function allDataGrid()
    // {
    //     print_r($this->model::get()->toTree());exit;
    // }
}
