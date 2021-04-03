<?php

namespace Modules\Home\Services;

use Modules\Admin\Entities\MenusModel;
use Nwidart\Menus\Facades\Menu;

class HomeServices
{
    public function getHeaderMenus()
    {
        $dataTree = MenusModel::get()->toTree();
        Menu::create('navbar', function($menu) use($dataTree) {
            $menu->style('navbar_bt4');
            $this->renderMenu($menu, $dataTree);
        });
        return Menu::get('navbar');
    }

    private function renderMenu(&$menu, $dataTree, $class = 'nav-link')
    {
        $dataTree->each(function($item) use(&$menu, $class) {
            $childrens = data_get($item, 'children');
            if ($childrens && $childrens->count() > 0) {
                $menu->dropdown(data_get($item, 'menu_name'), function($subMenu) use($childrens) {
                    $this->renderMenu($subMenu, $childrens, 'dropdown-item');
                });
            } else {
                $menu->url(data_get($item, 'menu_link'), data_get($item, 'menu_name'), ['class' => $class]);
            }
        });
    }
}
