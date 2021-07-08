<?php

namespace App\Repositories\Menus;

use App\Core\Repositories\BaseRepository;
use App\Core\Support\CommonHelper;
use App\Models\Menus\LeftMenu;
use App\Models\Menus\TopMenu;
use App\Repositories\Sections\SectionRepository;

class MenuRepository extends BaseRepository
{
    protected $modelClass = TopMenu::class;

    public function getAllMenus($userId)
    {
        $sectionRepo = resolve(SectionRepository::class);
        $listCode = $sectionRepo->getDataByPermissionUserId($userId)->pluck('code')->all();
        $sectionCode = CommonHelper::getSectionCode();
        $topMenu = TopMenu::whereIn('group', $listCode)->orderBy('index')->get();
        $leftMenu = LeftMenu::where('group', $sectionCode)->orderBy('index')->get();

        return ['topMenu' => $topMenu, 'leftMenu' => $leftMenu];
    }
}
