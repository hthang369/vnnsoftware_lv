<?php

namespace Modules\Home\Repositories;

use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Entities\PagesModel;
use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Repositories\PostsRepository;
use Modules\Admin\Repositories\SlidesRepository;
use Modules\Home\Entities\HomeModel;
use Modules\Home\Services\HomeServices;
use Vnnit\Core\Repositories\BaseRepository;

class HomeRepository extends BaseRepository
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

    public function show($id, $columns = [])
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
                $results['post_list'] = resolve(PostsRepository::class)->getAllDataByCategory($data->id, 'news')->toArray();
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
                'image' => ['src' => asset('storage/images/'.$item->advertise_image), 'lazyload' => false, 'height' => 350]
            ];
        })->all();
    }

    protected function getProductsData($category_id)
    {
        $results = resolve(PostsRepository::class)->getAllDataWithCategoryParent($category_id);
        return $results->groupBy('category_id')->map(function($item) {
            $categoryColumns = ['category_id', 'category_name', 'category_link', 'category_image'];
            $categoryInfo = $item->first()->only($categoryColumns);
            $categoryInfo['post_list'] = $this->generatePortfolio($item);
            return $categoryInfo;
        });
    }

    public function getHomeProducts()
    {
        $menu = CategoriesModel::where('category_link', 'thiet-ke-web')->first();
        return $this->generatePortfolio(resolve(PostsRepository::class)->getAllDataByCategoryParent($menu->id, 8));
    }

    public function findPostCategory($id)
    {
        $cat = CategoriesModel::where('category_link', $id)->first();
        $results = $cat->toArray();
        $results['post_list'] = $this->getAllPosts($cat->id);
        return $results;
    }

    public function findPost($id)
    {
        return PostsModel::where('post_link', $id)->first()->toArray();
    }

    protected function getAllPosts($id, $type = 'post')
    {
        $data = resolve(PostsRepository::class)->getAllDataByCategory($id, $type);
        return ['data' => $this->generatePortfolio($data->items()), 'pagination' => $data->links()];
    }

    protected function generatePortfolio($data)
    {
        return resolve(HomeServices::class)->generatePortfolio($data)->toArray();
    }
}
