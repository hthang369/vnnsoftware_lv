<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'role';

    protected $fillable = [
        'name', 'role_rank', 'description'
    ];

    protected $softDelete = true;

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_user');
    }

    public function role_has_feature_api()
    {
        return $this->hasMany('App\Models\RoleHasFeatureApi')->whereNull('deleted_at');
    }

    public function role_user()
    {
        return $this->hasMany('App\Models\RoleUser');
    }
}
