<?php

namespace App\Services;

use App\Models\PasswordResetModel;
use App\Repositories\Message\MessageRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Contract\MyService;

class UserService extends MyService
{

    private $MessageRepo;
    private $userRepo;


    public function __construct(MessageRepositoryInterface $MessageRepo, UserRepositoryInterface $userRepo)
    {
        $this->MessageRepo = $MessageRepo;
        $this->userRepo = $userRepo;

    }

    public function checkExistEmail($email)
    {

    }

}
