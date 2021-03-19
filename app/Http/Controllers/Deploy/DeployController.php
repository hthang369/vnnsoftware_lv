<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Services\ApprovalApiToken\ApprovalApiTokenService;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class DeployController extends Controller {

    public function index() {
        return view('deploy.list');
    }

    public function doDeploy(Request $request) {
        $listEnvironment = [
            'development'=>'http://172.16.2.8:8000',
            'staging'=>'http://172.16.3.36.:8000',
            'production'=>'http://laka.lampart-vn.com:8000',
        ];

        $tag    = $request->input('tag');
        $server = $request->input('server');
        $rs =  file_get_contents('http://172.16.3.36:8000/?tag=' . $tag . '&server=' . $server);
        return redirect(route('Deploy.Deploy index'))->with(['errors'=>$rs]);
    }
}
