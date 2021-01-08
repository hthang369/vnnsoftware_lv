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
    ) {
        $this->userRepo = $userRepo;
        $this->userValidate = $userValidate;
        $this->roleService = $roleService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $list = $this->userRepo->getAllPaginate($request);
        return view('/user-management/list')->with('list', $list);
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
    public function updateForm($id)
    {
        $user = $this->getUserById($id);
        $userRoleIds = array();
        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        foreach ($user->roles as $key => $value) {
            array_push($userRoleIds, $value->id);
        }
        return view('/user-management/add_form',
            [
                'roles' => $this->roleService->getAll(),
                'userRoleIds' => $userRoleIds
            ])->with('user', $user);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updatePasswordForm($id)
    {
        $user = $this->getUserById($id);
        $userRoleIds = array();
        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        foreach ($user->roles as $key => $value) {
            array_push($userRoleIds, $value->id);
        }
        return view('/user-management/update_password_form',
            [
                'roles' => $this->roleService->getAll(),
                'userRoleIds' => $userRoleIds
            ])->with('user', $user);
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
    public function Create(Request $request)
    {
        $validator = $this->userValidate->newValidate($request->all());

        if ($validator->fails()) {
            //return back()->withInput()->withErrors($validator->errors());
            return redirect()->intended(route('User Management.New.form'))->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        try {
            $user = $this->userRepo->Create($input);
            $user->roles()->attach($request->role);
            return redirect()
                ->intended('/   ail/' . $user->id)
                ->with('saved', true);
        } catch (\Exception $ex) {
            return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        // return $this->userRepo->update($id, $input);
        $user = $this->getUserById($id);

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        $validator = $this->userValidate->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->intended(route('User Management.Update[Permission].form', $id))->withInput()->withErrors($validator->errors());
        }

        $role = $user->roles;
        $hasPermission = false;
        foreach ($role as $value) {
            if ($value->name == config('constants.name.role_permission_name')) {
                foreach ($request->input('role') as $item) {
                    if ($item == $value->id) {
                        $hasPermission = true;
                    }
                }
                break;
            }
        }

        if (!$hasPermission) {
            if ($this->userRepo->countOthersPermissionUser(Auth::id())->total == 0) {
                return redirect()->back()->withInput()->with('errorCommon', __('custom_message.no_one_has_permission_set_role'));
            }
        }

        if (strlen($request['password']) != 0) {
            $input = request()->except(['_token', 'role']);
            $input['password'] = Hash::make($request['password']);
        } else
            $input = request()->except(['_token', 'role', 'password']);
        }

        try {
            $user->roles()->detach();
            $user->roles()->attach($request->role);
            $user = $this->userRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management/detail/' . $id);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $input = $request->all();
        if ($this->checkPassword(Auth::id(), $input['currentPassword'])) {
            $validator = $this->userValidate->changePasswordValidate($request);

            $input['newPassword'] = Hash::make($input['newPassword']);

            try {
                $this->userRepo->changePassword(Auth::id(), $input['newPassword']);
                return redirect()
                    ->intended('/system-admin/user-management/update-password/' . Auth::id())
                    ->with('success', true);
            } catch (\Exception $ex) {
                return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
            }
        } else {
            return redirect()
                ->intended('/system-admin/user-management/update-password/' . Auth::id())
                ->with('wrongCurrentPassword', true);
        }
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
        $user = $this->getUserById($id);

        if ($this->userRepo->countOthersPermissionUser(Auth::id())->total == 0) {
            return redirect()->back()->with('errorCommon', __('custom_message.no_one_has_permission_set_role'));
        }

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        try {
            $this->userRepo->delete($id);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management');

    }
}
