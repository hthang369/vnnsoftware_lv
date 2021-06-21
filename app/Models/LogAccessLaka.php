<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAccessLaka extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'log_access_lakas';
    protected $fillable = ['date_sent_request','time_sent_request', 'result', 'message', 'url_download'];

}
