<?php

namespace Modules\Admin\Entities;

use Modules\Core\Traits\FullTextSearch;

class RolesModel extends \Spatie\Permission\Models\Role
{
    use FullTextSearch;

    protected $table = 'roles';

    protected $fillable = [
        'level',
        'name',
        'role_rank',
        'guard_name',
        'sequence'
    ];
}
