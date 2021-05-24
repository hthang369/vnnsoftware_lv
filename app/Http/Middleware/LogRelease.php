<?php

namespace App\Http\Middleware;

use App\Services\LogRelease\LogReleaseService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogRelease
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
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
        $user_id = Auth::id();
        $redmine_id = $request->input('redmine_id');
        $version= $request->input('version');
        $environment = $request->input('environment');
        $this->logReleaseService->addLogRelease($user_id,$redmine_id,$version,$environment);
        return $next($request);
    }
}
