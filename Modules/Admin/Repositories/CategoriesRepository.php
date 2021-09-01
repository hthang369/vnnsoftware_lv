<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Forms\CategoriesForm;
use Modules\Admin\Grids\CategoriesGrid;

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
        return CategoriesGrid::class;
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
        if (!isset($attributes['category_status']))
            $attributes['category_status'] = 1;

        return parent::createNestedTree($attributes);
    }

    public function update(array $attributes, $id)
    {
        if (!isset($attributes['category_status']))
            $attributes['category_status'] = 1;

        return parent::updateNestedTree($attributes, $id);
    }

    // public function allDataGrid()
    // {
    //     print_r($this->model::get()->toTree());exit;
    // }
}
