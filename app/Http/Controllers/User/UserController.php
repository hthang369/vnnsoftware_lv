<?php
/**
 * Created by PhpStorm.
 * User: truong_nhat
 * Date: 11/11/2020
 * Time: 1:20 PM
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
//            'email' => 'required|email|exists:user.email',
            'email' => 'required|email',
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
}
