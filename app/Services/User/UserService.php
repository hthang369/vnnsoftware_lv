<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Contract\MyService;
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

    public function getUserById($id)
    {
        return $this->userRepo->getUserById($id);
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
        return $this->userRepo->delete($id);
    }
}
