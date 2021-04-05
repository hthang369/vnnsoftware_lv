<?php

namespace App\Http\Middleware;

use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return abort(403);
        }

        $currentRouteName = Route::currentRouteName();

        $listFeatureApiName = $this->roleHasFeatureApiRepo->getListNotHasPermissionByUserId(Auth::id());

        foreach ($listFeatureApiName as $item) {
            if (strpos($currentRouteName, $item->group . '.' . $item->function) !== false) {
                return abort(403);
            }
        }

        $this->shareNotHasPermission($listFeatureApiName);
        return $next($request);
    }

    private function shareNotHasPermission($listFeatureApiName)
    {
        $NOT_HAS_PERMISSION = [];
        foreach ($listFeatureApiName as $value) {
            array_push($NOT_HAS_PERMISSION, $value->group . '.' . $value->function);
        }

        View::share('NOT_HAS_PERMISSION', $NOT_HAS_PERMISSION);
    }
}
