<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Entities\MenusModel;
use Nwidart\Menus\Facades\Menu;
use Vnnit\Core\Facades\Common;

class MenuService
{
    public function getHeaderMenus()
    {
        $dataTree = MenusModel::where('menu_type', 'main')->get()->toTree();
        return $this->getHtmlMenus($dataTree, 'navbar', 'navbar_bt4');
    }

    public function getFooterMenus()
    {
        $dataTree = MenusModel::where('menu_type', 'footer')->get()->toTree();
        return $this->getHtmlMenus($dataTree, 'navbar');
    }

    public function getAdminSlidebars()
    {
        $results = config('admin.menus');

        $dataTree = array_map(function($item) {
            $item['visiable'] = Route::has($item['menu_link']) && user_can('view_'.$item['section']);
            if ($item['visiable']) {
                $item['actived'] = request()->routeIs($item['menu_name']);
                $item['menu_link'] = empty($item['menu_link']) ? '#' : route($item['menu_link']);
                $item['menu_title'] = trans($item['menu_title']);
            }
            return $item;
        }, $results);

        return $this->getHtmlMenus(collect($dataTree), 'slidebar', 'slidebar_bt4');
    }

    public function getSortableMenus($dataTree)
    {
        return Common::renderMenus($dataTree, 'nestedSortable', 'nested_sortable_bt4', false);
    }

    protected function getHtmlMenus($dataTree, $name, $menuStyle = null)
    {
        Menu::create($name, function($menu) use($dataTree, $menuStyle) {
            if (!is_null($menuStyle))
                $menu->style($menuStyle);
            $this->renderMenu($menu, $dataTree);
        });
        return Menu::get($name);
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
                    $menu->url(data_get($item, 'menu_link'), data_get($item, 'menu_title'),
                        [
                            'class' => $class,
                            'icon' => data_get($item, 'menu_icon'),
                            'active' => data_get($item, 'actived')
                        ]);
                }
            }
        });
    }
}
