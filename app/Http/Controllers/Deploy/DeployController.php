<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\DeployEnvironment;
use App\Models\DeployServer;
use Illuminate\Http\Request;
use Laka\Lib\Services\LakaDeploy;
use function Sodium\add;

class DeployController extends Controller
{
    public function index($environment)
    {
        // each environment has a list of servers
        $serverArray = [];
        foreach (config('deploy.list_environment.' . $environment) as $server => $value)
        {
            $deployServer = new DeployServer();
            $deployServer->set_version(DeployServer::getVersion($server, $environment));
            $deployServer->set_server($server);

            $serverArray[] = $deployServer;
        }

        return view('deploy.list')->with(['serverArray' => $serverArray, 'environment' => $environment]);
    }

    public function doDeploy(Request $request)
    {
        // todo: gọi api lên server để deploy
        $result = LakaDeploy::deploy(
            $request->get('server'),
            $request->get('environment'),
            $request->get('version')
        );

        $status = $result['development']['status'];
        $server = $request->get('server');
        $environment = $request->get('environment');
        $version = $request->get('version');
        $message = $result['development']['data']->return[0];

        return redirect(route('Deploy.Deploy index', ['environment' => $request->get('environment')]))
            ->with([
                'status' => $status,
                'server' => $server,
                'environment' => $environment,
                'version' => $version,
                'message' => $message,
            ]);
    }
}
