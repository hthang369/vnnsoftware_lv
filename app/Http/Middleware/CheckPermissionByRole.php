<?php

namespace App\Http\Middleware;

use App\Models\ListFunction;
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
        if (Auth::check()) {
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
        return abort(403);
    }

    private function shareNotHasPermission($listFeatureApiName)
    {
        $permission = [];
        foreach ($listFeatureApiName as $value) {
            array_push($permission, $value->group . '.' . $value->function);
        }

        View::share('NOT_HAS_PERMISSION', $permission);
    }
}
