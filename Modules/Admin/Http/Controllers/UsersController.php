<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\UsersRepository;
use Modules\Admin\Validators\UsersValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class UsersController extends CoreController
{
    public function __construct(UsersRepository $repository, UsersValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::users');
        $this->setRouteName('users');
        $this->setPathView([
            'create' => 'admin::users.user_modal',
            'show' => 'admin::users.user_modal'
        ]);
    }
}
