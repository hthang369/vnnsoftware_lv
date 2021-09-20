<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\Users\UserRepository;
use App\Validators\Users\UserValidator;
use Illuminate\Support\Facades\View;

/**
 * Class UserController
 * @package App\Http\Controllers\Users
 * @property UserRepository userRepository
 */
class UserController extends CoreController
{
    protected $listViewName = [
        'index'     => 'user-management.list',
        'create'    => 'user-management.create',
        'edit'      => 'user-management.update',
        'show'      => 'user-management.detail',
        'update'    => 'user-management.edit',
        'store'     => 'user-management.create',
    ];
    protected $errorRouteName =[
        'update'=>'user-management.edit'
    ];
    public function __construct(UserValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(UserRepository::class);

        View::share('titlePage', __('users.page_title'));
        View::share('headerPage', 'users.page_header');
    }
}
