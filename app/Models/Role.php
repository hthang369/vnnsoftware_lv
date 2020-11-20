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
}
