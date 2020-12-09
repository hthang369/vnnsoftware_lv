<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Services\Role\RoleService;
use App\Validations\RoleValidation;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return $this->roleService->index();
    }

    public function detail($id)
    {
        return $this->roleService->detail($id);
    }

    public function newForm() {
        return $this->roleService->newForm();
    }

    public function updateForm($id) {

        return $this->roleService->updateForm($id);
    }

    public function register(Request $request)
    {
        return $this->roleService->create($request);
    }

    public function update($id, Request $request)
    {
        return $this->roleService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->roleService->delete($id);
    }
}
