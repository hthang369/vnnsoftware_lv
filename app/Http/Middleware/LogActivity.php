<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\LogActivity\LogActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    public function handle($request, Closure $next)
    {
        $action = config('constants.'. Route::currentRouteName());
        $name = user_get('name') ?? 'Login';
        $this->logActivityService->addToLog($request, $name . " access to: " . $action);

        return $next($request);
    }
}
