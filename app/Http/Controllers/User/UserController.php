<?php
/**
 * Created by PhpStorm.
 * User: truong_nhat
 * Date: 11/11/2020
 * Time: 1:20 PM
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    const STATUS_ACTIVE = 1;
    const STATUS_NOT_ACTIVE = 2;

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $list = $this->userService->getAllUser();
        return view('/user-management/list')->with('list', $list);
    }


    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'The email is required.',
            'email.email' => 'The email needs to have a valid format.',
            'email.exists' => 'The email is not registered in the system.',
        ];


        $this->validate($request, $rules, $messages);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->intended('home');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['passcsscfsword' => 'fsdsfsdfdsf']);
        }

    }

    public function newForm()
    {
        return view('/user-management/add_form');
    }

    public function updateForm($id)
    {
        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(404,'Page not found');
        }

        return view('/user-management/add_form')->with('user', $user);
    }

    public function register(Request $request)
    {

        $validator = $this->userService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make('password');

        try {

            $user = $this->userService->create($input);
            return $this->detail($user->id);
        } catch (\Exception $ex) {
//            return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
        }

    }

    public function update($id, Request $request)
    {
        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(404,'Page not found');
        }

        $validator = $this->userService->ruleCreateUpdate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token']);
        $input['password'] = Hash::make('password');

        try {

            $user = $this->userService->update($id, $input);
        } catch (\Exception $ex) {
            print_r($ex->getMessage()); exit;
            abort(404,'Page not found');
        }

        return redirect()->intended('/system-admin/user-management/detail/11');
    }

    public function detail($id)
    {
        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(404,'Page not found');
        }

        return view('/user-management/detail')->with('user', $user);
    }

    public function delete($id)
    {
        $user = $this->userService->getUserById($id);

        if (is_null($user)) {
            abort(404,'Page not found');
        }

        try {

            $this->userService->delete($id);
        } catch (\Exception $ex) {
            print_r($ex->getMessage()); exit;
            abort(404,'Page not found');
        }

        return redirect()->intended('/system-admin/user-management');
    }
}
