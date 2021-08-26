<?php

namespace Modules\Home\Repositories;

use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Entities\PagesModel;
use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Repositories\PostsRepository;
use Modules\Admin\Repositories\SlidesRepository;
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
                $results['data_list'] = $this->getProductsData($data->id);
                break;
            case 'news':
                $data = CategoriesModel::find(data_get($menu, 'partial_id'));
                $results = $data->toArray();
                $results['post_list'] = resolve(PostsRepository::class)->getAllDataByCategory($data->id)->toArray();
                break;
        }
        return [
            'view_name' => data_get($menu, 'menu_view'),
            'data' => $results
        ];
    }

    public function getAllSlide()
    {
        $results = resolve(SlidesRepository::class)->all();
        return $results->map(function($item) {
            return [
                'image' => ['src' => asset('storage/images/'.$item->advertise_image), 'lazyload' => false]
            ];
        })->all();
    }

    protected function getProductsData($category_id)
    {
        $results = resolve(PostsRepository::class)->getAllDataByCategoryParent($category_id);
        return $results->groupBy('category_id')->map(function($item) {
            $categoryColumns = ['category_id', 'category_name', 'category_link', 'category_image'];
            $categoryInfo = $item->first()->only($categoryColumns);
            $columns = array_diff(array_keys($item->first()->getAttributes()), $categoryColumns);
            $categoryInfo['post_list'] = $item->map(function($product) use($columns) {
                return $product->only($columns);
            });
            return $categoryInfo;
        });
    }

    public function getHomeProducts()
    {
        $menu = CategoriesModel::where('category_link', 'thiet-ke-web')->first();
        return resolve(PostsRepository::class)->getAllDataByCategoryParent($menu->id);
    }

    public function findPost($id)
    {
        return PostsModel::where('post_link', $id)->first()->toArray();
    }
}
