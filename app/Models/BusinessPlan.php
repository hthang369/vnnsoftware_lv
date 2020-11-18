<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessPlan extends Model
{
    protected $table = 'business_plan';

    protected $fillable = [
        'name', 'description', 'maximum_storage_file'
    ];
}
