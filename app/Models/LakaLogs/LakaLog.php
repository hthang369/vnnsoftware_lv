<?php

namespace App\Models\LakaLogs;

use Laka\Core\Entities\BaseModel;

class LakaLog extends BaseModel
{
    protected $table = 'laka_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'url', 'message', 'date_log', 'log_level', 'log_type'
    ];

    protected $fillableColumns = [
        'id',
        'ip',
        'url',
        'log_level',
        'date_log',
        'message'
    ];
}
