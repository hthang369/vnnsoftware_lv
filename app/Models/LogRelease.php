<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRelease extends Model
{
    //
    protected $fillable = ['id', 'user_id','user_name','deploy_server_id', 'redmine_id', 'version', 'release_type','environment', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function server(){
        return $this->hasOne(DeployServer::class,id,deploy_server_id);
    }
}
