<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Home\Repositories\HomeCriteria;
use Modules\Home\Repositories\HomeRepository;
use Modules\Home\Responses\HomeResponse;
use Modules\Home\Services\HomeServices;
use Modules\Home\Validators\HomeValidator;
use Modules\Setting\Facade\Setting;

class HomeController extends BaseController
{
    protected $actionPermissionList = [
        'index' => 'public',
        'show' => 'public',
        'showPost' => 'public'
    ];

    protected $data;

    public function __construct(HomeRepository $repository, HomeValidator $validator, HomeResponse $response, HomeCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);

        $menus = resolve(HomeServices::class)->getHeaderMenus();

        $allSetting = Setting::getAllSetting();
        $footerMenu = '';
        $footerOurMenu = '';
        $webName = data_get($allSetting, 'info.web_name');
        $webAddess = data_get($allSetting, 'info.web_address');
        $webPhone = data_get($allSetting, 'info.web_phone');
        $webEmail = data_get($allSetting, 'info.web_email');

        $this->data = compact('menus', 'footerMenu', 'footerOurMenu', 'webName', 'webAddess', 'webPhone', 'webEmail');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('home::index', $this->data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $base = $this->repository->find($id);

        $viewName = $base['view_name'];
        if (blank($viewName)) $viewName = 'show';

        return view("home::$viewName", array_merge($this->data, $base['data']));
    }

}
