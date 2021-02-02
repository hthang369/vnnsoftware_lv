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

    /**
     * UserController constructor.
     * @param UserService $userService
     * @param RoleService $roleService
     * @param UserValidation $userValidate
     */
    public function __construct(
        UserService $userService,
        RoleService $roleService,
        UserValidation $userValidate)
    {
        parent::__construct();
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->userValidate = $userValidate;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('/common/index_page_top_menu');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $list = $this->userService->getAllPaginate($request);
        return view('/user-management/list')->with('list', $list);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->userService->loginValidate($request);

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
        $user = $this->userService->getUserById($id);
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
    public function updatePasswordForm($id)
    {
        $user = $this->userService->getUserById($id);
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validator = $this->userService->newValidate($request->all());

        if ($validator->fails()) {
            //return back()->withInput()->withErrors($validator->errors());
            return redirect('/system-admin/user-management/new')->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        try {
            $user = $this->userService->Create($input);
            $user->roles()->attach($request->role);
            return redirect()
                ->intended('/system-admin/user-management/detail/' . $user->id)
                ->with('saved', true);
        } catch (\Exception $ex) {
            echo $ex->getMessage();

        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        //return $this->userService->update($id, $request);

        $user = $this->userService->getUserById($id);

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

//        if (!$hasPermission) {
//            if ($this->userService->countOthersPermissionUser(Auth::id())->total == 0) {
//                return redirect()->intended('/system-admin/user-management/update/' . $id)->withInput()->with('errorCommon', __('custom_message.no_one_has_permission_set_role'));
//            }
//        }

        if (strlen($request['password']) != 0) {
            $input = request()->except(['_token', 'role']);
            $input['password'] = Hash::make($request['password']);
        } else {
            $input = request()->except(['_token', 'role', 'password']);
        }

        try {
            $user->roles()->detach();
            $user->roles()->attach($request->role);
            $user = $this->userService->update($id, $input);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management/detail/' . $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        return view('/user-management/detail')->with('user', $user);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = $this->userService->getUserById($id);

//        if ($this->userService->countOthersPermissionUser(Auth::id())->total == 0) {
//            return redirect()->intended('/system-admin/user-management')->with('errorCommon', __('custom_message.no_one_has_permission_set_role'));
//        }

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        try {
            $this->userService->delete($id);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management/list');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request){

        $input = $request->all();
        if ($this->userService->checkPassword(Auth::id(), $input['currentPassword'])) {
            $validator = $this->userService->changePasswordValidate($request);

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

    public function searchForm() {
        return view('/user-management/search');
    }

    public function ssh() {
        $connection = ssh2_connect('172.16.2.188', 22);
        ssh2_auth_password($connection, 'root', 'lampart');

        $stream = ssh2_exec($connection, 'ls -R');
        dd($stream);
    }

}
