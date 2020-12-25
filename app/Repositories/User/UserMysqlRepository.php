<?php

namespace App\Repositories\User;

use App\Repositories\MyRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserMysqlRepository extends MyRepository implements UserRepositoryInterface
{

    public function getUserById($id)
    {
        //return User::find($id)->with('roles');
        return User::with('roles')->get()->find($id);

    }

    public function getAllUser()
    {
        return User::all();
    }

    /**
     * @param $data
     *
     * @return bool
     */
    public function getUser($condition)
    {
        switch ($condition['type']) {
            case "id":
                return User::select(['id', 'email', 'name', 'company', 'icon_img', 'cover_img'])->find($condition['id']);
                break;
        }
    }

    /**
     * Get a user entity.
     *
     * @param string $username
     * @param string $password
     * @param string $grantType The grant type used
     * @param ClientEntityInterface $clientEntity
     *
     * @return UserEntityInterface
     */
    public function getUserEntityByUserCredentials($username, $password, $grantType, ClientEntityInterface $clientEntity)
    {
        // TODO: Implement getUserEntityByUserCredentials() method.
    }

    public function updateInfoUser($user_id, $update_data)
    {
        $user = User::where('id', $user_id);

        $user->update(
            [
                'name' => $update_data->input('name'),
                'company' => $update_data->input('company'),
            ]);
        return User::select(['id', 'email', 'name', 'company', 'icon_img'])->find($user_id);
    }

    public function Create($input)
    {
        return User::create($input);
    }

    public function update($id, $input)
    {
        return User::where('id', $id)
            ->update($input);
    }

    public function getUserIdWithEmail($email)
    {
        return User::where('email', 'like', $email)->first();
    }

    public function getListUserWithNameOrEmail($input, $userId)
    {
        return DB::table('users')
            ->select('users.id', 'users.name', 'users.company', 'users.icon_img', 'users.cover_img', 'users.email', 'contact.status as contact_status')
            ->leftJoin('contact', 'users.id', '=', 'contact.contact_user_id')
            ->where(function ($q) use ($input) {
                $q->where('users.name', 'like', '%' . preg_replace('/\s+/', '%', $input) . '%')
                    ->orWhere('users.email', 'like', '%' . preg_replace('/\s+/', '%', $input) . '%');
            })
            ->where('users.id', "<>", Auth::id())
            // ->where(function($q) {
            //     $q
            //         //->where('contact.status','<>',1)
            //       ->orWhereNull('contact.status');
            // })
            // ->where('users.id','<>',$userId)
            // ->where(function($q) use ($userId) {
            //     $q->where('contact.user_id','=',$userId)
            //       ->orWhereNull('contact.user_id');
            // })
            ->paginate(30);
    }

    public function checkPassword($id, $current)
    {
        $user = User::select(['password'])->find($id);
        if (strlen($current) !== strlen(trim($current))) {
            throw new \Exception('Password does not allow spaces before and after');
        }

        if (Hash::check($current, $user->password)
        ) {
            return true;
        }

        return false;
    }

    public function changePassword($id, $new)
    {
        return User::where('id', $id)->update(['password' => $new]);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }

    public function countOthersPermissionUser($id)
    {
        return DB::table('users')
            ->select(DB::raw('COUNT(users.id) AS total'))
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('role', 'role.id', '=', 'role_user.role_id')
            ->where('role.name', '=', config('constants.name.role_permission_name'))
            ->where('users.id', '<>', $id)
            ->whereNull('role.deleted_at')
            ->whereNull('users.deleted_at')
            ->first();
    }
}
