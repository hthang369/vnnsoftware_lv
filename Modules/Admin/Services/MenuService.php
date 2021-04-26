<?php

namespace Modules\Admin\Services;

use Modules\Admin\Entities\MenusModel;
use Nwidart\Menus\Facades\Menu;

class MenuService
{
    public function getHeaderMenus()
    {
        $dataTree = MenusModel::where('menu_type', 'main')->get()->toTree();
        Menu::create('navbar', function($menu) use($dataTree) {
            $menu->style('navbar_bt4');
            $this->renderMenu($menu, $dataTree);
        });
        return Menu::get('navbar');
    }

    public function getFooterMenus()
    {
        $dataTree = MenusModel::where('menu_type', 'footer')->get()->toTree();
        Menu::create('navbar', function($menu) use($dataTree) {
            // $menu->style('navbar_bt4');
            $this->renderMenu($menu, $dataTree);
        });
        return Menu::get('navbar');
    }

    public function getAdminSlidebars()
    {
        $path = module_path('Admin/Config');
        $results = include_once $path;

        $dataTree = array_map(function($item) {
            $item['actived'] = request()->routeIs($item['menu_name']) ? 'active' : '';
            $item['menu_link'] = route($item['menu_link']);
            $item['menu_title'] = trans($item['menu_title']);
            $item['visiable'] = user_can($item['section']);
            return $item;
        }, $results);

        Menu::create('slidebar', function($menu) use($dataTree) {
            // $menu->style('navbar_bt4');
            $this->renderMenu($menu, $dataTree);
        });
        return Menu::get('slidebar');
    }

    private function renderMenu(&$menu, $dataTree, $class = 'nav-link')
    {
        $dataTree->each(function($item) use(&$menu, $class) {
            if (data_get($item, 'visiable')) {
                $childrens = data_get($item, 'children');
                if ($childrens && $childrens->count() > 0) {
                    $menu->dropdown(data_get($item, 'menu_name'), function ($subMenu) use ($childrens) {
                        $this->renderMenu($subMenu, $childrens, 'dropdown-item');
                    });
                } else {
                    $menu->url(data_get($item, 'menu_link'), data_get($item, 'menu_title'), ['class' => $class]);
                }
            }
        });
    }
}
