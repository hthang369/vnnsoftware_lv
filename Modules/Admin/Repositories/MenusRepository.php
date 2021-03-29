<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Forms\MenusForm;
use Modules\Admin\Grids\MenusGridInterface;

class MenusRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenusModel::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    // public function grid()
    // {
    //     return MenusGridInterface::class;
    // }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return MenusForm::class;
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
