<?php

namespace App\Models\Roles;

use Laka\Core\Entities\BaseModel;

class Role extends BaseModel
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level', 'name', 'role_rank', 'description'
    ];

    protected $fillableColumns = [
        'id',
        'level',
        'name',
        'role_rank',
        'description'
    ];
}
