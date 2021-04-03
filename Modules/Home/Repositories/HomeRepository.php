<?php

namespace Modules\Home\Repositories;

use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Entities\PagesModel;
use Modules\Home\Entities\HomeModel;

class HomeRepository extends HomeBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HomeModel::class;
    }

    public function find($id, $columns = [])
    {
        $menu = MenusModel::where('menu_link', $id)->first();
        if (data_get($menu, 'partial_table') != 'category') {
            $data = PagesModel::find(data_get($menu, 'partial_id'));
            return $data->toArray();
        }
        return [];
    }
}
