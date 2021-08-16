<?php

namespace App\Models\LakaLogs;

use App\Core\Entities\BaseModel;

class LakaLog extends BaseModel
{
    protected $table = 'laka_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'url', 'message'
    ];

    protected $fillableColumns = [
        'id',
        'ip',
        'url'
    ];
}
