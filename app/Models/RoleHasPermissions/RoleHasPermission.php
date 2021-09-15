<?php

namespace App\Models\RoleHasPermissions;

use Laka\Core\Entities\BaseModel;

class RoleHasPermission extends BaseModel
{
    protected $table = 'role_has_permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    protected $fillableColumns = [
        'permission_id',
        'role_id',
    ];
}