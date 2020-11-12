<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getUserById($id);
    public function getUser($data);
    public function updateInfoUser($user_id, $update_data);
    public function Create($input);
    public function update($id, $input);
    public function getUserIdWithEmail($email);
    public function getListUserWithNameOrEmail($input, $userId);
    public function checkPassword($id, $current);
    public function changePassword($id, $new);
}
