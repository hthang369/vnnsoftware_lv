<?php

namespace App\Models\BusinessPlans;

use Laka\Core\Entities\BaseModel;

class BusinessPlan extends BaseModel
{
    protected $table = 'business_plan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    protected $fillableColumns = [
        'id',
        'name',
        'description',
    ];
}
