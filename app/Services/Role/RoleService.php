<?php

namespace App\Services\Role;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Services\Contract\MyService;
use App\Validations\RoleValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleService extends MyService
{
    private $roleRepo;
    private $roleValidation;

    /**
     * RoleService constructor.
     * @param RoleRepositoryInterface $roleRepo
     * @param RoleValidation $roleValidation
     */
    public function __construct(RoleRepositoryInterface $roleRepo, RoleValidation $roleValidation)
    {
        $this->roleRepo = $roleRepo;
        $this->roleValidation = $roleValidation;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $list = $this->roleRepo->getAllPaginate($request);
        $listApiName = $this->roleRepo->getAllFeatureApiName();

        $data = ['list' => $list, 'listApiName' => $listApiName];
        return $data;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $role = $this->roleRepo->getById($id);
        $role->role_has_feature_api = $role->role_has_feature_api()->get();

        return $role;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getById($id)
    {
        $role = $this->roleRepo->getById($id);

        return $role;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($input)
    {
        return $this->roleRepo->create($input);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->roleRepo->getAll();
    }

    /**
     * @return mixed
     */
    public function getAllFeatureApiName()
    {
        return $this->roleRepo->getAllFeatureApiName();
    }

    /**
     * @return mixed
     */
    public function checkIsUsedRoleById($id)
    {
        return $this->roleRepo->getRoleUserByRoleId($id);
    }
}
