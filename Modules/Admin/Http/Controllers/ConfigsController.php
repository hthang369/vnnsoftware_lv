<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\ConfigsCriteria;
use Modules\Admin\Repositories\ConfigsRepository;
use Modules\Admin\Responses\ConfigsResponse;
use Modules\Admin\Validators\ConfigsValidator;
use Modules\Core\Http\Controllers\CoreController;

class ConfigsController extends CoreController
{
    public function __construct(ConfigsRepository $repository, ConfigsValidator $validator, ConfigsResponse $response, ConfigsCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::configs');
        $this->setRouteName('configs');
        $this->setPathView([
            'edit'  => 'admin::configs.index',
            'create' => 'admin::configs.slide_modal',
            'show' => 'admin::configs.slide_modal'
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        list($configs, $formData) = $this->repository->formGenerateConfig('info', route('configs.edit', 'info'));
        list($configMaps, $formMapData) = $this->repository->formGenerateConfigMap('map', route('configs.edit', 'map'));
        list($configHomes, $formHomeData) = $this->repository->formGenerateConfigHome('home', route('configs.edit', 'home'));

        $form = $this->formBuilder->create($formData, $configs);
        $formMap = $this->formBuilder->create($formMapData, $configMaps);
        $formHome = $this->formBuilder->create($formHomeData, $configHomes);

        return $this->renderViewData(compact('form', 'formMap', 'formHome'), __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = $id == 'info' ? 'update' : 'edit';
        $actionMap = $id == 'map' ? 'update' : 'edit';
        $actionHome = $id == 'home' ? 'update' : 'edit';

        list($configs, $formData) = $this->repository->formGenerateConfig('info', route("configs.$action", 'info'));
        list($configMaps, $formMapData) = $this->repository->formGenerateConfigMap('map', route("configs.$actionMap", 'map'));
        list($configHomes, $formHomeData) = $this->repository->formGenerateConfigHome('home', route("configs.$actionHome", 'home'));

        $configs['method'] = $id == 'info' ? 'POST' : 'GET';
        $configMaps['method'] = $id == 'map' ? 'POST' : 'GET';
        $configHomes['method'] = $id == 'home' ? 'POST' : 'GET';

        $methodAct = $id == 'info' ? ['action' => 'edit'] : [];
        $methodActMap = $id == 'map' ? ['action' => 'edit'] : [];
        $methodActHome = $id == 'home' ? ['action' => 'edit'] : [];

        $form = $this->formBuilder->create($formData, $configs, $methodAct);
        $formMap = $this->formBuilder->create($formMapData, $configMaps, $methodActMap);
        $formHome = $this->formBuilder->create($formHomeData, $configHomes, $methodActHome);

        return $this->renderViewData(compact('form', 'formMap', 'formHome'), __FUNCTION__);
    }

    // public function store(Request $request)
    // {
    //     print_r($request->all());
    // }
}
