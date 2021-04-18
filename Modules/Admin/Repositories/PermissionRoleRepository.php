<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\PermissionRoleModel;
use Modules\Admin\Grids\PermissionRoleGrid;

class PermissionRoleRepository extends AdminBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PermissionRoleModel::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return PermissionRoleGrid::class;
    }
}
