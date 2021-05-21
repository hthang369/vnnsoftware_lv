<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\DeployEnvironment;
use App\Models\DeployServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
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



        if ($version[0] == 'v' || $version[0] == 'V')
        {
            if($environment == 'development')
            {
                preg_match('/-dev$/', $version, $match);
                if($match[0] != '-dev')
                {
                    return redirect(route('Version Deploy.Deploy index.' . ucfirst($environment)))
                        ->with([
                            'status' => false,
                            'message' => Lang::get('custom_message.alert_input_environment_dev'),
                        ]);
                }
            }

            else if($environment == 'staging')
            {
                preg_match('/-stg$/', $version, $match);
                if($match[0] != '-stg')
                {
                    return redirect(route('Version Deploy.Deploy index.' . ucfirst($environment)))
                        ->with([
                            'status' => false,
                            'message' => Lang::get('custom_message.alert_input_environment_stg'),
                        ]);
                }
            }
        }



        if ($request->get('version') == null) {
            return redirect(route('Version Deploy.Deploy index.' . ucfirst($environment)))
                ->with([
                    'status' => false,
                    'message' => Lang::get('custom_message.alert_input_version'),
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
