<?php

namespace App\Services\TopMenu;

use App\Repositories\LeftMenu\LeftMenuRepositoryInterface;
use App\Repositories\TopMenu\TopMenuRepositoryInterface;
use App\Services\Contract\MyService;
use App\TopMenu;
use App\Validations\TopMenuValidation;
use Illuminate\Http\Request;

class TopMenuService extends MyService
{
    private $topMenuRepo;
    private $topMenuValidation;
    private $leftMenuRepo;

    /**
     * TopMenuService constructor.
     * @param TopMenuRepositoryInterface $topMenuRepo
     * @param LeftMenuRepositoryInterface $leftMenuRepo
     * @param TopMenuValidation $topMenuValidation
     */
    public function __construct(TopMenuRepositoryInterface $topMenuRepo, TopMenuValidation $topMenuValidation, LeftMenuRepositoryInterface $leftMenuRepo)
    {
        $this->topMenuRepo = $topMenuRepo;
        $this->topMenuValidation = $topMenuValidation;
        $this->leftMenuRepo = $leftMenuRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $list = $this->topMenuRepo->getAllPaginate();
        return view('/top-menu/list')->with('list', $list);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $topMenu = $this->topMenuRepo->getById($id);

        if (is_null($topMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        return view('/top-menu/detail')->with('topMenu', $topMenu);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        return view('/top-menu/add_form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = $this->topMenuValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $topMenu = $this->topMenuRepo->create($input);
            return redirect()->intended('/system-admin/top-menu/detail/' . $topMenu->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm($id)
    {
        $topMenu = $this->topMenuRepo->getById($id);

        if (is_null($topMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        return view('/top-menu/update_form')->with(['topMenu' => $topMenu]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $topMenu = $this->topMenuRepo->getById($id);

        if (is_null($topMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        $validator = $this->topMenuValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $topMenu->update($input);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/top-menu/detail/' . $id)->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $topMenu = $this->topMenuRepo->getById($id);

        if (is_null($topMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        if (!is_null($this->leftMenuRepo->getOneByTopMenuId($id))) {
            return redirect()->back()->with('used', true);
        }

        try {
            $topMenu->delete();
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/top-menu')->with('deleted', true);
    }

}
