<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'company';

    protected $fillable = [
        'name', 'email', 'phone', 'business_plan_id', 'address'
    ];

    protected $softDelete = true;
}
