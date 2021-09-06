<?php

namespace App\Models\Deploys;

use Laka\Core\Entities\BaseModel;
use Laka\Lib\Services\LakaDeploy;

class Deploy extends BaseModel
{
    protected $table = 'deploy_server';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    protected $fillableColumns = [
        'id',
        'name'
    ];

    public $server;
    public $version;

    function setVersion($version)
    {
        $this->version = $version;
    }

    function setServer($server)
    {
        $this->server = $server;
    }

    static function getVersion($server, $environment)
    {
        $result = LakaDeploy::getVersion($server, $environment);
        return $result[$environment]->return[0];
    }
}
