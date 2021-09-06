<?php

namespace App\Models\Permissions;

use Laka\Core\Entities\BaseModel;

class RoleHasPermissions extends BaseModel
{
    protected $table = 'role_has_permissions';

    protected $fillable = [
        'permission_id',
        'role_id',
    ];
}
