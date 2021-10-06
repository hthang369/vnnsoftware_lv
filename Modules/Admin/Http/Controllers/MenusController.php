<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\MenusRepository;
use Modules\Admin\Validators\MenusValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class MenusController extends CoreController
{
    protected $actionPermissionList = [
        'view' => 'view'
    ];

    public function __construct(MenusRepository $repository, MenusValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::menus');
        $this->setRouteName('menus');
        $this->setPathView([
            'view'  => 'admin::menus.index',
            'create' => 'admin::menus.menu_modal',
            'show' => 'admin::menus.menu_modal'
        ]);
    }

    public function view($id = null)
    {
        $menu_type = head(array_keys(config('admin.menu_type')));
        request()->merge(['type' => $id ?? $menu_type]);
        $data = $this->repository->allDataGrid();
        return $this->renderView($data, __FUNCTION__);
    }


}
