<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\RolesCriteria;
use Modules\Admin\Repositories\RolesRepository;
use Modules\Admin\Responses\RolesResponse;
use Modules\Admin\Validators\RolesValidator;
use Modules\Core\Http\Controllers\CoreController;

class RolesController extends CoreController
{
    public function __construct(RolesRepository $repository, RolesValidator $validator, RolesResponse $response, RolesCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::roles');
        $this->setRouteName('role');
        $this->setPathView([
            'create' => 'admin::roles.slide_modal',
            'show' => 'admin::roles.slide_modal'
        ]);
    }

    public function permissionRole(Request $request, $id)
    {

    }
}
