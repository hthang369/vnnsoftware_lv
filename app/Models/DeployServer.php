<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laka\Lib\Services\LakaDeploy;

class DeployServer extends Model
{

    public $server;
    public $version;

    protected $fillable = ['id', 'name'];
    protected $table = "deploy_server";

    function set_version($version)
    {
        $this->version = $version;
    }

    function set_server($server)
    {
        $this->server = $server;
    }

    static function getVersion($server, $environment)
    {
        $result = LakaDeploy::getVersion($server, $environment);
        return $result[$environment]->return[0];
    }
}
