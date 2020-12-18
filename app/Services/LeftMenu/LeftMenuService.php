<?php

namespace App\Services\LeftMenu;

use App\Repositories\LeftMenu\LeftMenuRepositoryInterface;
use App\Repositories\TopMenu\TopMenuRepositoryInterface;
use App\Services\Contract\MyService;
use App\LeftMenu;
use App\Validations\LeftMenuValidation;
use Illuminate\Http\Request;

class LeftMenuService extends MyService
{
    private $leftMenuRepo;
    private $leftMenuValidation;
    private $topMenuRepo;

    /**
     * LeftMenuService constructor.
     * @param LeftMenuRepositoryInterface $leftMenuRepo
     * @param TopMenuRepositoryInterface $topMenuRepo
     * @param LeftMenuValidation $leftMenuValidation
     */
    public function __construct(LeftMenuRepositoryInterface $leftMenuRepo, LeftMenuValidation $leftMenuValidation, TopMenuRepositoryInterface $topMenuRepo)
    {
        $this->leftMenuRepo = $leftMenuRepo;
        $this->leftMenuValidation = $leftMenuValidation;
        $this->topMenuRepo = $topMenuRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $list = $this->leftMenuRepo->getAllPaginate();
        return view('/left-menu/list')->with('list', $list);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $leftMenu = $this->leftMenuRepo->getById($id);

        if (is_null($leftMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        $leftMenu->topMenu = $leftMenu->top_menu();

        return view('/left-menu/detail')->with('leftMenu', $leftMenu);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        $listTopMenu = $this->topMenuRepo->getAll();
        return view('/left-menu/add_form')->with('listTopMenu', $listTopMenu);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = $this->leftMenuValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $leftMenu = $this->leftMenuRepo->create($input);
            return redirect()->intended('/system-admin/left-menu/detail/' . $leftMenu->id)->with('saved', true);
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
        $leftMenu = $this->leftMenuRepo->getById($id);

        if (is_null($leftMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        $listTopMenu = $this->topMenuRepo->getAll();

        return view('/left-menu/update_form')->with(['leftMenu' => $leftMenu, 'listTopMenu' => $listTopMenu]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $leftMenu = $this->leftMenuRepo->getById($id);

        if (is_null($leftMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        $validator = $this->leftMenuValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $leftMenu->update($input);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/left-menu/detail/' . $id)->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $leftMenu = $this->leftMenuRepo->getById($id);

        if (is_null($leftMenu)) {
            abort(400, __('custom_message.top_menu_not_found'));
        }

        try {
            $leftMenu->delete();
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/left-menu')->with('deleted', true);
    }

}
