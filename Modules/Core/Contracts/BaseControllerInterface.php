<?php

namespace Modules\Core\Contracts;

use Illuminate\Http\Request;

/**
 * Interface BaseControllerInterface
 * @package Modules\Core\Contracts
 */
interface BaseControllerInterface
{
    /**
     * @param $criteria
     * @return mixed
     */
    public function pushDefaultCriteria($criteria);

    /**
     * @param $data
     * @param $rules
     * @return mixed
     */
    public function validator($data, $rules);

    /**
     * @return mixed
     */
    public function index();

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param int $id
     * @return mixed
     */
    public function show($id);

    /**
     * @param int $id
     * @return mixed
     */
    public function edit($id);

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function import(Request $request, $id);

    /**
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function export(Request $request, $id);
}
