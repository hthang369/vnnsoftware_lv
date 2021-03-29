<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\DeployEnvironment;
use Illuminate\Http\Request;
use Laka\Lib\Services\LakaDeploy;
use function Sodium\add;

class DeployController extends Controller
{
    public function index()
    {   
        // todo: gọi api để lấy dữ liệu về

        $environmentArray = [];

        foreach (config('deploy.list_environment') as $environment => $type) {
            // array of DeployEnvironment objects
            $deployEnvironmentArray = [];
            foreach ($type as $typeName => $value) {
                $deployEnvironment = new DeployEnvironment();
                $deployEnvironment->set_environment($environment);
                $deployEnvironment->set_type($typeName);
                $deployEnvironment->set_version(DeployEnvironment::getVersion($environment, $typeName));
                // add DeployEnvironment object to array
                $deployEnvironmentArray[] = $deployEnvironment;
            }
            // add array of DeployEnvironment objects to 1 environment
            $environmentArray[$environment] = $deployEnvironmentArray;
        }
        return view('deploy.list')->with(['environmentArray' => $environmentArray]);
    }

    public function doDeploy(Request $request)
    {
        // todo: gọi api lên server để deploy
        $result = LakaDeploy::deploy(
            $request->get('environment'),
            $request->get('type'),
            $request->get('version')
        );

        $status = $result['development']['status'];
        $environment = $request->get('environment');
        $type = $request->get('type');
        $version = $request->get('version');
        $message = $result['development']['data']->return[0];

        return redirect(route('Deploy.Deploy index'))
            ->with([
                'status' => $status,
                'environment' => $environment,
                'type' => $type,
                'version' => $version,
                'message' => $message,
            ]);
    }
}
