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
use Illuminate\Support\Facades\Validator;

class UserService extends MyService
{
    private $userRepo;
    private $userValidate;
    private $roleService;

    public function __construct(UserRepositoryInterface $userRepo, UserValidation $userValidate, RoleService $roleService)
    {
        $this->userRepo = $userRepo;
        $this->userValidate = $userValidate;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $list = $this->getAllUser();
        return view('/user-management/list')->with('list', $list);
    }

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

    public function newForm()
    {
        return view('/user-management/add_form',
            ['roles' => $this->roleService->getAll(), 'user' => new User()]);
    }

    public function updateForm($id)
    {
        $user = $this->getUserById($id);
        $userRoleIds = array();
        if (is_null($user)) {
            abort(400,__('custom_message.user_not_found'));
        }

        foreach ($user->roles as $key => $value)
        {
            array_push($userRoleIds, $value->id);
        }
        return view('/user-management/add_form',
            [
                'roles' => $this->roleService->getAll(),
                'userRoleIds' => $userRoleIds
            ])->with('user', $user);
    }

    public function detailForm($id){

        $user = $this->getUserById($id);

        if (is_null($user)) {
            abort(400,__('custom_message.user_not_found'));
        }

        return view('/user-management/detail')->with('user', $user);
    }

    public function getUserById($id)
    {
        return $this->userRepo->getUserById($id);
    }

    public function Create(Request $request)
    {
        $validator = $this->userValidate->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        try {
            $user = $this->userRepo->Create($input);
            $user->roles()->attach($request->role);
            return redirect()
                ->intended('/system-admin/user-management/detail/' . $user->id)
                ->with('saved', true);
        } catch (\Exception $ex) {
            return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
        }
    }

    public function update($id, Request $request)
    {
       // return $this->userRepo->update($id, $input);
        $user = $this->getUserById($id);

        if (is_null($user)) {
            abort(400, __('custom_message.user_not_found'));
        }

        $validator = $this->userValidate->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if(strlen($request['password']) != 0)
        {
            $input = request()->except(['_token', 'role']);
            $input['password'] = Hash::make($request['password']);
        }
        else
            $input = request()->except(['_token', 'role', 'password']);

        try {
            $user->roles()->detach();
            $user->roles()->attach($request->role);
            $user = $this->userRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management/detail/' . $id);
    }

    public function getUserIdWithEmail($email)
    {
        return $this->userRepo->getUserIdWithEmail($email);
    }

    public function getListUserWithNameOrEmail($input, $userId)
    {
        $query = DB::select('call usp_get_list_user_by_contact(?,?)', [$input ?? "", $userId]);
        return $query;
    }

    public function getAllEmail()
    {
        return User::all('email', 'id', 'icon_img', 'cover_img', 'company');
    }

    public function checkPassword($id, $current)
    {
        return $this->userRepo->checkPassword($id, $current);
    }

    public function changePassword($id, $new)
    {
        return $this->userRepo->changePassword($id, $new);
    }

    public function getUserInfo($id)
    {
        return User::find($id);
    }

    // insert for sync_data version
    public function getAllUser()
    {
        return User::with('roles')->get();
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function delete($id)
    {
        $user = $this->getUserById($id);

        if (is_null($user)) {
            abort(400,__('custom_message.user_not_found'));
        }

        try {
            $this->userRepo->delete($id);
        } catch (\Exception $ex) {
            abort(400,$ex->getMessage());
        }

        return redirect()->intended('/system-admin/user-management');

    }
}
