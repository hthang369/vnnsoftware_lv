<?php

namespace App\Http\Controllers\FeatureApi;

use App\Http\Controllers\Controller;
use App\Services\FeatureApi\FeatureApiService;
use Illuminate\Http\Request;

class FeatureApiController extends Controller
{

    private $featureApiService;

    public function __construct(FeatureApiService $featureApiService)
    {
        $this->featureApiService = $featureApiService;
    }

    public function index()
    {
        $list = $this->featureApiService->getAll();
        return view('/feature-api/list')->with('list', $list);
    }

    public function detail($id)
    {
        $featureApi = $this->featureApiService->getById($id);

        if (is_null($featureApi)) {
            abort(404,'Page not found');
        }

        return view('/feature-api/detail')->with('featureApi', $featureApi);
    }

    public function newForm() {
        return view('/feature-api/add_form')->with('isNew', true);
    }

    public function updateForm($id) {
        $featureApi = $this->featureApiService->getById($id);

        if (is_null($featureApi)) {
            abort(404,'Page not found');
        }

        return view('/feature-api/add_form')->with('featureApi', $featureApi);
    }

    public function register(Request $request)
    {

        $validator = $this->featureApiService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $featureApi = $this->featureApiService->create($input);
            return redirect()->intended('/system-admin/feature-api/detail/' . $featureApi->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(500);
        }
    }

    public function update($id, Request $request)
    {
        $featureApi = $this->featureApiService->getById($id);

        if (is_null($featureApi)) {
            abort(404,'Page not found');
        }

        $validator = $this->featureApiService->ruleCreateUpdate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'FeatureApi']);

        try {
            $featureApi = $this->featureApiService->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/feature-api/detail/' . $id)->with('saved', true);
    }

    public function delete($id)
    {
        $featureApi = $this->featureApiService->getById($id);

        if (is_null($featureApi)) {
            abort(404,'Page not found');
        }

        try {

            $this->featureApiService->delete($id);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/feature-api')->with('deleted', true);
    }
}
