<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Modules\Admin\Facades\Breadcrumb;
use Vnnit\Core\Facades\Common;

class InfoWeb
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $sectionCode = Common::getSectionCode();
        $pageTitle = 'dashboard';
        Breadcrumb::add('<i class="fa fa-home"></i>', route('admin.index'));
        if (!str_is($sectionCode, 'admin')) {
            Breadcrumb::add(__("admin::menus.$sectionCode"), null);
            $pageTitle = $sectionCode;
        }
        View::share('page_title', "admin::menus.page_title.$pageTitle");
        return $next($request);
    }
}
