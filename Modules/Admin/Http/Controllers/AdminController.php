<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Modules\Admin\Repositories\AdminRepository;
use Modules\Admin\Validators\AdminValidator;
use Vnnit\Core\Http\Controllers\BaseController;
use Vnnit\Core\Responses\BaseResponse;

class AdminController extends BaseController
{
    public function __construct(AdminRepository $repository, AdminValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = $this->repository->getWatherInfo();
        return $this->responseView(request(), $data, 'admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
