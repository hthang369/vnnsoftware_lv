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
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\Services\LogActivity\LogActivityService;


class UserController extends Controller
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    private $userService;
    private $roleService;
    private $userValidate;
    private $logActivityService;

    /**
     * UserController constructor.
     * @param UserService $userService
     * @param RoleService $roleService
     * @param UserValidation $userValidate
     */
    public function __construct(
        UserService $userService,
        RoleService $roleService,
        UserValidation $userValidate,
        LogActivityService $logActivityService)
    {
        parent::__construct();

        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->userValidate = $userValidate;
        $this->logActivityService = $logActivityService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('/common/index_page_top_menu');
    }

    /**
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        $list = $this->userService->getAllPaginate($request);
        return view('/user-management/list')->with('list', $list);
    }

    /**
     * @return Application|Factory|View
     */
    public function newForm()
    {
        return view('/user-management/add_form',
            ['roles' => $this->roleService->getAll(), 'user' => new User()]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
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
        return view('/user-management/update_form',
            [
                'roles' => $this->roleService->getAll(),
                'userRoleIds' => $userRoleIds
            ])->with('user', $user);
    }

    /**
     * @param $id
     * @return Application|Factory|View
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
     * @return RedirectResponse
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
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request)
    {

        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        $validator = $this->userValidate->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect('/system-admin/user-management/update/' . $id)->withInput()->withErrors($validator->errors());
        }

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
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management/detail/' . $id);
    }

    /**
     * @param $id
     * @return Application|Factory|View
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePassword(Request $request)
    {

        $input = $request->all();
        if ($this->userService->checkPassword(Auth::id(), $input['currentPassword'])) {
            $validator = $this->userService->changePasswordValidate($request);

            $input['newPassword'] = Hash::make($input['newPassword']);

            try {
                $this->userService->changePassword(Auth::id(), $input['newPassword']);
                return redirect()
                    ->intended('/system-admin/user-management/update-password/' . Auth::id())
                    ->with('success', true);
            } catch (Exception $ex) {
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
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        try {
            $this->userService->deleteEmail($id);
            $this->userService->delete($id);
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }
        return redirect()->intended('/system-admin/user-management/list');
    }

    public function searchForm()
    {
        return view('/user-management/search');
    }

    public function ssh()
    {
        $connection = ssh2_connect('172.16.2.6', 22);

        $pass_success = ssh2_auth_password($connection, 'root', 'lampart');

        ssh2_exec($connection, 'cd /var/www/vhosts');
        $stream = ssh2_exec($connection, 'mkdir test');

//        $con=ssh2_connect('172.16.2.6', 22);
//        ssh2_auth_password($con, 'root', 'lampart');
//        $shell=ssh2_shell($con, 'xterm');
//        fwrite( $shell, 'cd /var/www/vhosts'.PHP_EOL);
//        fwrite( $shell, 'mkdir test'.PHP_EOL);

        //dd( stream_get_contents($stream));
    }
}
