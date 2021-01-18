<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureApi extends Model
{
    protected $table = 'feature_api';

    protected $fillable = [
        'feature', 'api', 'name'
    ];
}
