<?php

namespace Modules\Admin\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Admin\Services\MenuService;

class MenuComposer
{
    public $slidebar = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->slidebar = resolve(MenuService::class)->getAdminSlidebars();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('slidebar', $this->slidebar);
    }
}
