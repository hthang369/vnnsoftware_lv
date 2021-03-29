<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Forms\MenusForm;
use Modules\Admin\Grids\MenusGridInterface;
use Modules\Admin\Repositories\MenusCriteria;
use Modules\Admin\Repositories\MenusRepository;
use Modules\Admin\Responses\MenusResponse;
use Modules\Admin\Validators\MenusValidator;
use Modules\Core\Http\Controllers\CoreController;

class MenusController extends CoreController
{
    public function __construct(MenusRepository $repository, MenusValidator $validator, MenusResponse $response, MenusCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::menus');
        $this->setRouteName('menus');
        $this->setPathView([
            'create' => 'admin::menus.menu_modal',
            'show' => 'admin::menus.menu_modal'
        ]);
    }
}
