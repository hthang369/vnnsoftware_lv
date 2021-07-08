<?php

namespace App\Models\Companys;

use App\Core\Entities\BaseModel;

class Company extends BaseModel
{
    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'business_plan_id', 'address'
    ];

    protected $fillableColumns = [
        'id',
        'name',
        'email',
        'phone',
        'business_plan_id',
        'address'
    ];
}
