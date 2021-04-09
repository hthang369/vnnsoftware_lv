<?php

namespace Modules\Home\Repositories;

use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Entities\PagesModel;
use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Repositories\PostsRepository;
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
        $results = [];
        switch(data_get($menu, 'partial_table')) {
            case 'page':
                $data = PagesModel::find(data_get($menu, 'partial_id'));
                $results = $data->toArray();
                break;
            case 'category':
                $data = CategoriesModel::find(data_get($menu, 'partial_id'));
                $results = $data->toArray();
                $results['post_list'] = resolve(PostsRepository::class)->getAllDataByCategory($data->id)->toArray();
                break;
        }
        return [
            'view_name' => $menu->menu_view,
            'data' => $results
        ];
    }
}
