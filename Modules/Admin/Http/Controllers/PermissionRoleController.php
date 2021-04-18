<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\PermissionRoleCriteria;
use Modules\Admin\Repositories\PermissionRoleRepository;
use Modules\Admin\Responses\PermissionRoleResponse;
use Modules\Admin\Validators\PermissionRoleValidator;
use Modules\Core\Http\Controllers\CoreController;

class PermissionRoleController extends CoreController
{
    public function __construct(PermissionRoleRepository $repository, PermissionRoleValidator $validator, PermissionRoleResponse $response, PermissionRoleCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::permission_roles');
        $this->setRouteName('role_has_permissions');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        foreach ($this->defaultCriteria as $criteria) {
            $criteria->role_id = $id;
            $this->repository->pushCriteria($criteria);
        }
        $bases = $this->repository->allDataGrid();
        $role_id = $id;
        return $this->renderView($bases->withoutFilters(), __FUNCTION__, null, compact('role_id'));
    }
}
