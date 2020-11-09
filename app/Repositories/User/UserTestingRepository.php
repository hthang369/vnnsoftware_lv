<?php

namespace App\Repositories\Message;

use App\Repositories\MyRepository;

class MessageTestingRepositories extends MyRepository implements MessageRepositoryInterface
{

    public function getMM()
    {
        return 'testing';
    }

    public function getMM2()
    {
        // TODO: Implement getMM2() method.
    }

    public function saveMessage($data)
    {
        // TODO: Implement saveMessage() method.
    }
}
