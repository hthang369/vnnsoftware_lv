<?php

namespace App\Http\Middleware;

use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckPermissionByRole
{

    private $roleHasFeatureApiRepo;

    public function __construct(RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo)
    {
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            $currentRouteName = Route::currentRouteName();
            $listFeatureApiName = $this->roleHasFeatureApiRepo->getListFeatureApiNameByUserId(Auth::id());

            foreach ($listFeatureApiName as $item) {
                if ($currentRouteName == $item->feature_api_name) {
                    return $next($request);
                }
            }
        }
        return abort(403);
    }
}
