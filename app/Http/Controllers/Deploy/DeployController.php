<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\DeployEnvironment;
use App\Models\DeployServer;
use Illuminate\Http\Request;
use Laka\Lib\Services\LakaDeploy;

class DeployController extends Controller
{
    public function index(Request $request)
    {
        preg_match('/deploy\/(development|staging|production)$/', $request->getUri(), $matches);

        $environment = $matches[1];

        // each environment has a list of servers
        $serverArray = [];
        foreach (config('deploy.list_environment.' . $environment) as $server => $value) {
            $deployServer = new DeployServer();
            $version = DeployServer::getVersion($server, $environment);
            if ($version == null) {
                $deployServer->set_version(null);
            } else {
                $deployServer->set_version($version);
            }
            //$deployServer->set_version($version);
            $deployServer->set_server($server);

            $serverArray[] = $deployServer;
        }

        return view('deploy.list')->with(['serverArray' => $serverArray, 'environment' => $environment]);
    }

    public function doDeploy(Request $request)
    {

        $environment = $request->get('environment');

        $server = $request->get('server');
        $version = $request->get('version');

        switch ($environment) {
            case 'development':
                $version .= '-dev';
                break;
            case 'staging':
                $version .= '-stg';
                break;
            default:
                break;
        }

        if($version[0] != 'v')
        {
            $version = 'v' . $version;
        }

         if ($request->get('version') == null) {
            return redirect(route('Version Deploy.Deploy index.' . ucfirst($environment)))
                ->with([
                    'status' => false,
                ]);
        }

        // todo: gọi api lên server để deploy
        $result = LakaDeploy::deploy(
            $server,
            $environment,
            $version
        );

        $status = $result[$environment]['status'];
        $message = $result[$environment]['data']->return[0];

        return redirect(route('Version Deploy.Deploy index.' . ucfirst($environment)))
            ->with([
                'status' => $status,
                'server' => $server,
                'environment' => $environment,
                'version' => $version,
                'message' => $message,
            ]);
    }
}
