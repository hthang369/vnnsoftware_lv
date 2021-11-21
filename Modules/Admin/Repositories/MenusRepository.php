<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Facades\Menus;
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

    public function getMenus($menu)
    {
        $menus = $this->model->where('menu_type', $menu)->defaultOrder()->get()->toTree();
        return Menus::getSortableMenus($menus);
    }

    public function updateSort(array $attributes, $id)
    {
        // $menus = $this->model->where('menu_type', $id)
        //     ->select(['id', 'parent_id', 'menu_lft', 'menu_rgt'])
        //     ->defaultOrder()->get()->toList(['id', 'children']);
        foreach ($attributes as $number => $item) {
            if (isset($item['children'])) {
                foreach ($item['children'] as $num => $itemChildren) {
                    $model = $this->model->find($itemChildren['id']);
                    if (data_get($model, 'parent_id', 0) != $item['id']) {
                        $model->parent_id = $item['id'];
                        parent::updateNestedTree($model->toArray(), $model->id);
                    }
                    list($lft, $rgt) = $this->model->getPlainNodeData($itemChildren['id']);
                    $this->moveNodeUpdate($itemChildren['id'], $lft - ($num + 1));
                }
            }
            $model = $this->moveNodeUpdate($item['id'], $number + 1);
        }
        return true;
    }

    private function moveNodeUpdate($id, $position)
    {
        return $this->model->moveNode($id, $position);
    }
}
