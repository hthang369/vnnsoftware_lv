<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\UsersCriteria;
use Modules\Admin\Repositories\UsersRepository;
use Modules\Admin\Responses\UsersResponse;
use Modules\Admin\Validators\UsersValidator;
use Modules\Core\Http\Controllers\CoreController;

class UsersController extends CoreController
{
    public function __construct(UsersRepository $repository, UsersValidator $validator, UsersResponse $response, UsersCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::users');
        $this->setRouteName('users');
        $this->setPathView([
            'create' => 'admin::users.user_modal',
            'show' => 'admin::users.user_modal'
        ]);
    }
}
