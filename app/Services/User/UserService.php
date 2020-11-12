<?php

namespace App\Services\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Services\Contract\MyService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService extends MyService
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;

    }

    public function Create($input)
    {
        return $this->userRepo->Create($input);
    }

    public function update($id, $input)
    {
        return $this->userRepo->update($id, $input);
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


    public function ruleCreate($request)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',
        ]);
    }

    public function ruleUpdate(Request $request)
    {
        $validator = ['name' => 'required'];
        if ($request->has('choose_change_password') && $request->input('choose_change_password') == "true") {
            if (!$request->has('current_password')) {
                throw new \Exception('Don\'t have current password');
            }

            if (!$request->has('new_password')) {
                throw new \Exception('Don\'t have new password');
            }

            $validator = array_merge($validator, [
                'current_password' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $currentPasswordFromDb = Auth::user()->makeVisible('password')->toArray()['password'];
                        if (!Hash::check($value, $currentPasswordFromDb)) {
                            return $fail('The current password incorrect.');
                        }
                    }
                ],
                'new_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        if ($value === $request->input('current_password')) {
                            return $fail('The ' . $attribute . ' is the same current password.');
                        }
                    }
                ]
            ]);
        }

        return $validator = Validator::make($request->all(), $validator);
    }

    public function getFriendList($input, $userId)
    {
        $query = DB::select('call usp_get_list_user(?,?)', [$input, $userId]);
        return $query;
    }

    public function getListWaitAccept($input, $userId)
    {
        $query = DB::select('call usp_get_list_wait_for_accept(?)', [$userId]);
        $query = $query + DB::select('call usp_get_list_user(?,?)', [$input ?? "", $userId]);
        return $query;
    }

    public function getAllUserByMyContact($input)
    {
        $userId = Auth::id();
        $listUser = $this->getListUserWithNameOrEmail($input, $userId);
        return $listUser;
    }

    /**
     * Kiểm tra người chính có đang chờ người phụ accect không
     *
     * @param $idUserCheck Người phụ
     * @param $userId Người chính
     *
     * @return bool
     */
    public function IsWaitingForAccept($idUserCheck, $userId)
    {
        $query = DB::select('call usp_get_status_friend(?,?)', [$userId, $idUserCheck]);
        if ($query) {
            return true;
        } else {
            return false;
        }

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
        return DB::select('call usp_get_list_user_by_contact(?,?)', ["", Auth::id()]);
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }
}
