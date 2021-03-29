<?php
namespace App\Repositories\User;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getUserById($id);
    public function getAllUser();
    public function getAllPaginate(Request $request);
    public function getUser($data);
    public function updateInfoUser($user_id, $update_data);
    public function Create($input);
    public function update($id, $input);
    public function getUserIdWithEmail($email);
    public function getListUserWithNameOrEmail($input, $userId);
    public function checkPassword($id, $current);
    public function changePassword($id, $new);
    public function delete($id);
    public function deleteEmail($id);
    public function countOthersPermissionUser($id);
}
