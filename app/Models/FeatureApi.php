<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeatureApi extends Model
{
    use SoftDeletes;

    protected $table = 'feature_api';

    protected $fillable = [
        'feature', 'api'
    ];

    protected $softDelete = true;
}
