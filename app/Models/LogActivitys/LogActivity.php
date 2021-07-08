<?php

namespace App\Models\LogActivitys;

use App\Core\Entities\BaseModel;

class LogActivity extends BaseModel
{
    protected $table = 'logactivity';

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
