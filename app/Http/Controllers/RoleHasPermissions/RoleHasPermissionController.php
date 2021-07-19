<?php

namespace App\Http\Controllers\RoleHasPermissions;

use App\Core\Http\Response\WebResponse;
use App\Http\Controllers\Core\CoreController;
use App\Models\Permissions\Role;
use App\Repositories\RoleHasPermissions\RoleHasPermissionRepository;
use App\Transformers\RoleHasPermissionsTransformer;
use App\Validators\RoleHasPermissions\RoleHasPermissionValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

/**
 * Class RoleHasPermissionController
 * @package App\Http\Controllers\RoleHasPermissions
 * @property RoleHasPermissionRepository rolehaspermissionRepository
 */
class RoleHasPermissionController extends CoreController
{
    protected $listViewName = [
        'update' => 'permission-role.show'
    ];

    public function __construct(RoleHasPermissionValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(RoleHasPermissionRepository::class);
        View::share('titlePage', 'Cài đặt phân quyền');
        View::share('headerPage', 'custom_title.set_permission_for_role');
    }

    public function showByRole($id)
    {
        extract($id);
        $base = $this->repository->getDataByRole($id);
        $role = Role::find($id);
        $base = array_add($base, 'role', $role);

        return WebResponse::success('role.permission', $base);
    }
}
