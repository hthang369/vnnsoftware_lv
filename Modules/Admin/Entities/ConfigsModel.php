<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConfigsModel extends Model
{
    protected $table = 'configs';

    protected $fillable = [
        'config_name',
        'config_value'
    ];
}
