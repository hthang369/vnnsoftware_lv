<?php

namespace App\Http\Middleware;

use App\Models\DeployServer;
use App\Services\LogRelease\LogReleaseService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogRelease
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    private $logReleaseService;

    public function __construct(LogReleaseService $logReleaseService)
    {
        $this->logReleaseService = $logReleaseService;
    }

    public function handle(Request $request, Closure $next)
    {
        $deploy_server = DeployServer::all();
        foreach ($deploy_server as $id => $dep_loy_server_name) {
            if ($dep_loy_server_name->name == $request->input('server')) {
                $deploy_server_id = $dep_loy_server_name->id;
            }
        }

        $user_id = Auth::id();
        $user_name = Auth::user()->name;
        $redmine_id = $request->input('redmine_id');
        $version = $request->input('version');
        $environment = $request->input('environment');

        $this->logReleaseService->addLogRelease($user_id, $user_name, $deploy_server_id, $redmine_id, $version, $environment);
        die();
        return $next($request);
    }
}
