<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Services\ApprovalApiToken\ApprovalApiTokenService;
use App\Services\Company\CompanyService;
use App\Services\DeployService;
use Illuminate\Http\Request;

class DeployController extends Controller {

    public function index() {
        return view('deploy.list');
    }

    public function doDeploy(Request $request) {

        $deployService   = new DeployService();
        return $deployService->getVersionAPI();

        $tag    = $request->input('tag');
        $server = $request->input('server');
        $rs     = file_get_contents('http://172.16.3.36:8000/?tag=' . $tag . '&server=' . $server);

        return redirect(route('Deploy.Deploy index'))->with(['errors' => $rs]);
    }
}
