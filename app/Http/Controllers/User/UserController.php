<?php
/**
 * Created by PhpStorm.
 * User: truong_nhat
 * Date: 11/11/2020
 * Time: 1:20 PM
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Services\Role\RoleService;
use App\Services\User\UserService;
use App\Models\User;
use App\Validations\UserValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    private $userService;
    private $roleService;
    private $userValidate;

    public function __construct(
        UserService $userService,
        RoleService $roleService,
        UserValidation $userValidate)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->userValidate = $userValidate;
    }

    public function index()
    {
        return $this->userService->index();
    }

    public function login(Request $request)
    {
        return $this->userService->login($request);
    }

    public function newForm()
    {
        return $this->userService->newForm();
    }

    public function updateForm($id)
    {
       return $this->userService->updateForm($id);
    }

    public function register(Request $request)
    {
        return $this->userService->Create($request);
    }

    public function update($id, Request $request)
    {
        return $this->userService->update($id, $request);
    }

    public function detail($id)
    {
       return $this->userService->detailForm($id);
    }

    public function delete($id)
    {
        return $this->userService->delete($id);
    }
}
