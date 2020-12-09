<?php

namespace App\Services\FeatureApi;


use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiMysqlRepository;
use App\Services\Contract\MyService;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use App\Validations\FeatureApiValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeatureApiService extends MyService
{
    private $featureApiRepo;
    private $roleHasFeatureApiRepo;
    private $roleHasFeatureApiService;
    private $featureApiValidation;

    public function __construct(
        FeatureApiRepositoryInterface $featureApiRepo,
        RoleHasFeatureApiMysqlRepository $roleHasFeatureApiRepo,
        FeatureApiValidation $featureApiValidation,
        RoleHasFeatureApiService $roleHasFeatureApiService)
    {
        $this->featureApiRepo = $featureApiRepo;
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
        $this->featureApiValidation = $featureApiValidation;
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
    }

    public function index()
    {
        $list = $this->getAll();
        return view('/feature-api/list')->with('list', $list);
    }

    public function detail($id)
    {
        $featureApi = $this->getById($id);

        if (is_null($featureApi)) {
            abort(400, __('custom_message.feature_api_not_found'));
        }

        return view('/feature-api/detail')->with('featureApi', $featureApi);
    }

    public function newForm()
    {
        return view('/feature-api/add_form');
    }

    public function updateForm($id)
    {
        $featureApi = $this->getById($id);

        if (is_null($featureApi)) {
            abort(400, __('custom_message.feature_api_not_found'));
        }

        return view('/feature-api/add_form')->with('featureApi', $featureApi);
    }

    public function getById($id)
    {
        return $this->featureApiRepo->getById($id);
    }

    public function create($request)
    {
        // return $this->featureApiRepo->create($input);

        $validator = $this->featureApiValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $featureApi = $this->featureApiRepo->create($input);
            return redirect()->intended('/system-admin/feature-api/detail/' . $featureApi->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(400,$ex->getMessage());
        }
    }

    public function update($id, $request)
    {
        //return $this->featureApiRepo->update($id, $input);

        $featureApi = $this->getById($id);

        if (is_null($featureApi)) {
            abort(400, __('custom_message.feature_api_not_found'));
        }

        $validator = $this->featureApiValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'FeatureApi']);

        try {
            $featureApi =  $this->featureApiRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(400,$ex->getMessage());
        }

        return redirect()->intended('/system-admin/feature-api/detail/' . $id)->with('saved', true);
    }

    public function ruleCreateUpdate($request)
    {
        return $validator = Validator::make($request, [
            'feature' => 'required|max:255',
            'api' => 'required|max:255',
        ]);
    }

    public function getAll()
    {
        return $this->featureApiRepo->getAll();
    }

    public function delete($id)
    {
        //return $this->featureApiRepo->delete($id);
        $featureApi = $this->getById($id);

        if (is_null($featureApi)) {
            abort(400,  __('custom_message.feature_api_not_found'));
        }

        try {
            DB::beginTransaction();
            $this->featureApiRepo->delete($id);
            $this->roleHasFeatureApiService->deleteByFeatureApiId($featureApi->id);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400,$ex->getMessage());
        }

        return redirect()->intended('/system-admin/feature-api')->with('deleted', true);
    }

    public function saveAllRoutesToDB()
    {
        $routeCollection = \Route::getRoutes();
        try {
            DB::beginTransaction();

            $this->featureApiRepo->deleteAll();
            foreach ($routeCollection as $value) {
                $input = [];
                $input['api'] = $value->uri();
                $input['name'] = $value->getName();
                $this->featureApiRepo->create($input);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400,$ex->getMessage());
        }
    }
}
