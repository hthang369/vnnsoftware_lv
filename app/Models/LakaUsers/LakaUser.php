<?php

namespace App\Models\LakaUsers;

use Laka\Core\Entities\BaseModel;

class LakaUser extends BaseModel
{
    protected $table = 'lakauser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'status'
    ];

    protected $fillableColumns = [
        'id',
        'name',
        'description',
        'status'
    ];
}
