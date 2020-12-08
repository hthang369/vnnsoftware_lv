<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleHasFeatureApi extends Model
{
    use SoftDeletes;

    protected $table = 'role_has_feature_api';

    protected $fillable = [
        'feature_api_name', 'role_id'
    ];

    protected $softDelete = true;
}
