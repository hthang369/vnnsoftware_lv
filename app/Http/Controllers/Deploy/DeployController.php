<?php

namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Services\ApprovalApiToken\ApprovalApiTokenService;
use App\Services\Company\CompanyService;
use App\Services\DeployService;
use Illuminate\Http\Request;

class DeployController extends Controller {

    public function index() {
        // todo: gọi api để lấy dữ liệu về
        return view('deploy.list');
    }

    public function doDeploy(Request $request) {
        // todo: gọi api lên server để deploy

        return redirect(route('Deploy.Deploy index'))->with(['errors' => []]);
    }
}
