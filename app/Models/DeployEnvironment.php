<?php
namespace App\Models;

use Laka\Lib\Services\LakaDeploy;

class DeployEnvironment{
    public $environment;
    public $type;
    public $version;

    // Methods
    function set_environment($environment) {
        $this->environment = $environment;
    }
    function set_type($type) {
        $this->type = $type;
    }
    function set_version($version) {
        $this->version = $version;
    }

    static function getVersion($environment, $type){
        $result = LakaDeploy::getVersion($environment, $type);
        return $result[$type]->return[0];
    }
}
