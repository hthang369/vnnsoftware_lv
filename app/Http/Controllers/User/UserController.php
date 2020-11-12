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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('/user-management/list');
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

    public function register(Request $request)
    {
//        print_r($request->all()); exit;

        $validator = $this->userService->ruleCreate($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make('password');

        try {
            DB::beginTransaction();

            $user = $this->userService->create($input);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
        }

        return redirect()->intended('detail');
    }
}
