<?php

namespace App\Repositories\Roles;

use App\Repositories\Core\CoreRepository;
use App\Models\Roles\Role;
use App\Presenters\Roles\RoleGridPresenter;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class RoleRepository extends CoreRepository
{
    protected $modelClass = Role::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $presenterClass = RoleGridPresenter::class;
}
