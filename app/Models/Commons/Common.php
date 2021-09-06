<?php

namespace App\Models\Commons;

use Laka\Core\Entities\BaseModel;

class Common extends BaseModel
{
    protected $table = 'common';

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
