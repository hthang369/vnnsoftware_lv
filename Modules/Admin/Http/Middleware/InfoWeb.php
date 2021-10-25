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
        Breadcrumb::add('<i class="fa fa-home"></i>', route('admin.index'));
        Breadcrumb::add(__("admin::menus.$sectionCode"), null);
        View::share('page_title', "admin::menus.page_title.$sectionCode");
        return $next($request);
    }
}
