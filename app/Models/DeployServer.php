<?php
namespace App\Models;

use Laka\Lib\Services\LakaDeploy;

class DeployServer{

    public $server;
    public $version;

    function set_version($version) {
        $this->version = $version;
    }

    function set_server($server) {
        $this->server = $server;
    }

    static function getVersion($server, $environment){
        //$result = LakaDeploy::getVersion($server, $environment);
        $result = array([0 => 5]);
        return $result[$environment]->return[0];
    }
}
