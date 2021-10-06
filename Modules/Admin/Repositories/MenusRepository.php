<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Forms\MenusForm;
use Modules\Admin\Grids\MenusGrid;

class MenusRepository extends AdminBaseRepository
{
    use MenusCriteria;

    protected $presenterClass = MenusGrid::class;
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
        $attributes = array_except($attributes, '_token');
        if (!isset($attributes['menu_link'])) {
            $attributes['menu_link'] = str_slug($attributes['menu_name']);
        }
        $attributes['partial_id'] = data_get($attributes, $attributes['partial_table']);
        return parent::createNestedTree($attributes);
    }

    public function update(array $attributes, $id)
    {
        $attributes = array_except($attributes, '_token');
        if (!isset($attributes['menu_link'])) {
            $attributes['menu_link'] = str_slug($attributes['menu_name']);
        }
        $attributes['partial_id'] = data_get($attributes, $attributes['partial_table']);
        return parent::updateNestedTree($attributes, $id);
    }
}
