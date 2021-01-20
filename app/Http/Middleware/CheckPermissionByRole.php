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

            $listFeatureApiName = $this->roleHasFeatureApiRepo->getListFeatureApiNameByUserId(Auth::id());

            foreach ($listFeatureApiName as $item) {
                if (strpos($currentRouteName, $item->feature . '.' . $item->name) !== false) {
                    $this->sharePermission($listFeatureApiName);
                    return $next($request);
                }
            }

            $listFunction = ListFunction::select('group', 'function')->get();
            $has = false;
            foreach ($listFunction as $function) {
                if (strpos($currentRouteName, $function->group . '.' . $function->function) !== false) {
                    $has = true;
                    break;
                }
            }
            if (!$has) {
                $this->sharePermission($listFeatureApiName);
                return $next($request);
            }
        }
        return abort(403);
    }

    private function sharePermission($listFeatureApiName) {
        $permission = [];
        foreach ($listFeatureApiName as $value) {
            array_push($permission, $value->feature . '.' . $value->name);
        }

        View::share('permission', $permission);
    }
}
