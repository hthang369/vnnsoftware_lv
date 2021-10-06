<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Home\Repositories\HomeRepository;
use Modules\Home\Responses\HomeResponse;
use Modules\Home\Services\HomeServices;
use Modules\Home\Validators\HomeValidator;
use Modules\Setting\Facade\Setting;
use Vnnit\Core\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    protected $permissionActions = [
        'index' => 'public',
        'show' => 'public',
        'showPost' => 'public',
        'showPostDetail' => 'public',
        'sendMail' => 'public'
    ];

    protected $data;
    protected $allSetting;

    public function __construct(HomeRepository $repository, HomeValidator $validator, HomeResponse $response)
    {
        parent::__construct($repository, $validator, $response);

        $menus = resolve(HomeServices::class)->getHeaderMenus();
        $footerMenu = resolve(HomeServices::class)->getFooterMenus();
        $footerOurMenu = resolve(HomeServices::class)->getFooterOurMenus();

        $this->allSetting = Setting::getAllSetting();
        $webName = data_get($this->allSetting, 'info.web_name');
        $webAddess = data_get($this->allSetting, 'info.web_address');
        $webPhone = data_get($this->allSetting, 'info.web_phone');
        $webEmail = data_get($this->allSetting, 'info.web_email');

        $webFavicon = data_get($this->allSetting, 'home.web_favicon');
        $webLogo = data_get($this->allSetting, 'home.web_logo');

        $headerSocial = data_get($this->allSetting, 'widget.text_header_social');
        $footerSocial = data_get($this->allSetting, 'widget.text_footer_social');
        $topHeader = data_get($this->allSetting, 'widget.text_top_herder');

        $this->data = compact('menus', 'footerMenu', 'footerOurMenu', 'webName', 'webAddess', 'webPhone', 'webEmail', 'webFavicon', 'webLogo', 'headerSocial', 'footerSocial', 'topHeader');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $slides = $this->repository->getAllSlide();
        $products = $this->repository->getHomeProducts();
        return view('home::index', array_merge($this->data, compact('slides', 'products')));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $base = $this->repository->show($id);

        $viewName = $base['view_name'];
        if (blank($viewName)) $viewName = 'show';
        $this->data['mapInfo'] = data_get($this->allSetting, 'map.web_map');

        return view("home::$viewName", array_merge($this->data, $base['data']));
    }

    public function showPost($id)
    {
        $base = $this->repository->findPostCategory($id);

        $viewName = 'category';
        $this->data['mapInfo'] = data_get($this->allSetting, 'map.web_map');

        return view("home::$viewName", array_merge($this->data, $base));
    }

    public function showPostDetail($id)
    {
        $base = $this->repository->findPost($id);

        $viewName = 'show';
        $this->data['mapInfo'] = data_get($this->allSetting, 'map.web_map');

        return view("home::$viewName", array_merge($this->data, $base));
    }
}
