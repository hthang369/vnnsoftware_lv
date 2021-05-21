<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\LogActivity\LogActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    private $logActivityService;

    public function __construct(LogActivityService $logActivityService)
    {
        $this->logActivityService = $logActivityService;
    }

    public function handle($request, Closure $next, $action)
    {
        $this->logActivityService->addToLog($request, Auth::user()->name . " access to: " . $action);

        return $next($request);
    }
}
