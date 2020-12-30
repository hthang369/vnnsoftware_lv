<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\LeftMenu;
use App\Models\TopMenu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        Schema::defaultStringLength(191);

        $topMenu = TopMenu::all();
        $leftMenu = LeftMenu::all();

        View::share(['TOPMENU' => $topMenu, 'LEFTMENU' => $leftMenu]);
    }
}
