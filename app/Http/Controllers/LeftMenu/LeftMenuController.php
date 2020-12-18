<?php

namespace App\Http\Controllers\LeftMenu;

use App\Http\Controllers\Controller;
use App\Services\LeftMenu\LeftMenuService;
use Illuminate\Http\Request;

class LeftMenuController extends Controller
{

    private $leftMenuService;

    /**
     * LeftMenuController constructor.
     * @param LeftMenuService $leftMenuService
     */
    public function __construct(LeftMenuService $leftMenuService)
    {
        $this->leftMenuService = $leftMenuService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->leftMenuService->list();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        return $this->leftMenuService->detail($id);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        return $this->leftMenuService->newForm();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm($id)
    {
        return $this->leftMenuService->updateForm($id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        return $this->leftMenuService->create($request);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        return $this->leftMenuService->update($id, $request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->leftMenuService->delete($id);
    }
}
