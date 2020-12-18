<?php

namespace App\Repositories\TopMenu;

use App\Repositories\MyRepository;
use App\Models\TopMenu;

class TopMenuMysqlRepository extends MyRepository implements TopMenuRepositoryInterface
{

    public function getById($id)
    {
        return TopMenu::find($id);
    }

    public function getAllPaginate()
    {
        return TopMenu::paginate(config('constants.pagination.items_per_page'));
    }

    public function create($input)
    {
        $topMenu = new TopMenu($input);
        $topMenu->save();
        return $topMenu;
    }
}
