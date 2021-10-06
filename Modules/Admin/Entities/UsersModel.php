<?php

namespace Modules\Admin\Entities;

use App\Models\User\User;
use Modules\Core\Traits\FullTextSearch;
use Spatie\Permission\Models\Role;

class UsersModel extends User
{
    use FullTextSearch;

    public function getRoles()
    {
        return $this->belongsToMany(Role::class, config('permission.table_names.model_has_roles'), config('permission.column_names.model_morph_key'));
    }

    public function getRoleListAttribute()
    {
        return $this->getRoles()->pluck('level');
    }
}
