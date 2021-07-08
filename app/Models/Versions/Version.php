<?php

namespace App\Models\Versions;

use App\Core\Entities\BaseModel;

class Version extends BaseModel
{
    protected $table = 'version';

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
