<?php

namespace App\Http\Controllers\LogRelease;

use App\Http\Controllers\Controller;
use App\Models\DeployServer;
use App\Services\LogRelease\LogReleaseService;
use Illuminate\Http\Request;

class LogReleaseController extends Controller
{

    private $logReleaseService;

    public function __construct(LogReleaseService $logReleaseService)
    {

        parent::__construct();
        $this->logReleaseService = $logReleaseService;
    }

    public function getLogReleaseList()
    {
        $deploy_server = DeployServer::get();
        $logReleaseList = $this->logReleaseService->getLogReleaseList();

        return view('logs-release.list', compact('logReleaseList', 'deploy_server'));
    }

    public function getLogReleaseByUserId($user_id)
    {
        $deploy_server = DeployServer::get();

        $logReleaseList = $this->logReleaseService->getLogReleaseByUserId($user_id);
        return view('logs-release.list', compact('logReleaseList', 'user_id','deploy_server'));
    }

    public function searchLogRelease(Request $request)
    {
        $deploy_server = DeployServer::get();

        $logReleaseList = $this->logReleaseService->searchLogRelease($request);

        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $redmine_id = $request->input('redmine_id');
        $version = $request->input('version');
        $release_type = $request->input('release_type');
        $environment = $request->input('environment');
        $deploy_server_id = $request->input('deploy_server_id');
        return view('logs-release.list', compact('logReleaseList', 'deploy_server','deploy_server_id','user_id', 'user_name', 'redmine_id', 'version', 'release_type', 'environment'));
    }
}
