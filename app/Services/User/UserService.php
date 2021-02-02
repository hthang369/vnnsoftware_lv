<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Contract\MyService;
use App\Services\Role\RoleService;
use App\Validations\UserValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService extends MyService
{
    private $userRepo;
    private $userValidate;
    private $roleService;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepo
     * @param UserValidation $userValidate
     * @param RoleService $roleService
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        UserValidation $userValidate,
        RoleService $roleService
    )
    {
        $this->userRepo = $userRepo;
        $this->userValidate = $userValidate;
        $this->roleService = $roleService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->userValidate->loginValidate($request);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->intended('home');
        } else {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['passcsscfsword' => 'fsdsfsdfdsf']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        return view('/user-management/add_form',
            ['roles' => $this->roleService->getAll(), 'user' => new User()]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailForm($id)
    {

        $user = $this->getUserById($id);

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        return view('/user-management/detail')->with('user', $user);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        return $this->userRepo->getUserById($id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Create($input)
    {
        return $this->userRepo->Create($input);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, $input)
    {
       return $this->userRepo->update($id, $input);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUserIdWithEmail($email)
    {
        return $this->userRepo->getUserIdWithEmail($email);
    }

    /**
     * @param $input
     * @param $userId
     * @return array
     */
    public function getListUserWithNameOrEmail($input, $userId)
    {
        $query = DB::select('call usp_get_list_user_by_contact(?,?)', [$input ?? "", $userId]);
        return $query;
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllEmail()
    {
        return User::all('email', 'id', 'icon_img', 'cover_img', 'company');
    }

    /**
     * @param $id
     * @param $current
     * @return mixed
     */
    public function checkPassword($id, $current)
    {
        return $this->userRepo->checkPassword($id, $current);
    }

    public function changePassword($id, $newPassword) {
        $this->userRepo->changePassword($id, $newPassword);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserInfo($id)
    {
        return User::find($id);
    }

    // insert for sync_data version

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllUser()
    {
        return User::with('roles')->get();
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getCurrentUser()
    {
        return Auth::user();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->userRepo->delete($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getAllPaginate($request) {
        return $this->userRepo->getAllPaginate($request);
    }

    public function loginValidate($request) {
        $this->userValidate->loginValidate($request);
    }

    public function newValidate($request) {
        return $this->userValidate->newValidate($request);
    }

    public function changePasswordValidate($request) {
        return $this->userValidate->changePasswordValidate($request);
    }

    public function countOthersPermissionUser($id) {
        return $this->userRepo->countOthersPermissionUser($id);
    }
}
