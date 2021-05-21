<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRelease extends Model
{
    //
    protected $fillable = ['id', 'user_id', 'redmine_id', 'version', 'release_type','environment', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
