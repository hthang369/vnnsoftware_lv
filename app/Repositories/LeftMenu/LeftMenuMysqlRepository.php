<?php

namespace App\Repositories\LeftMenu;

use App\Repositories\MyRepository;
use App\Models\LeftMenu;

class LeftMenuMysqlRepository extends MyRepository implements LeftMenuRepositoryInterface
{

    public function getById($id)
    {
        return LeftMenu::find($id);
    }

    public function getOneByTopMenuId($id)
    {
        return LeftMenu::where('top_menu_id', '=', $id)
            ->whereNull('deleted_at')
            ->first();
    }

    public function getAllPaginate()
    {
        return LeftMenu::select("left_menu.*", "top_menu.name as top_menu_name")
            ->join('top_menu', 'left_menu.top_menu_id', '=', 'top_menu.id')
            ->paginate(config('constants.pagination.items_per_page'));
    }

    public function create($input)
    {
        $topMenu = new LeftMenu($input);
        $topMenu->save();
        return $topMenu;
    }
}
