<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Core\Repositories\BaseRepository;
use Modules\Core\Responses\BaseResponse;
use Modules\Core\Validators\BaseValidator;
use Prettus\Repository\Contracts\CriteriaInterface;

class CoreController extends BaseController
{
    private $defaultView;
    private $pathView;
    private $routeName;
    protected $formBuilder;

    public function __construct(BaseRepository $repository, BaseValidator $validator, BaseResponse $response, CriteriaInterface $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->formBuilder = resolve(FormBuilder::class);
    }

    public function setDefaultView($value)
    {
        $this->defaultView = $value;
    }

    public function setPathView($value)
    {
        $this->pathView = $value;
    }

    public function setRouteName($value)
    {
        $this->routeName = $value;
    }

    public function renderView($dataGrid, $viewName, $customName = null)
    {
        $defaultName = $customName ?? data_get($this->pathView, $viewName, $this->defaultView . '.' . $viewName);
        return $dataGrid->renderOn($defaultName);
    }

    public function renderViewData($data, $viewName, $customName = null)
    {
        $defaultName = $customName ?? data_get($this->pathView, $viewName, $this->defaultView . '.' . $viewName);
        return view($defaultName, $data)->render();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $bases = $this->repository->allDataGrid();
        return $this->renderView($bases, __FUNCTION__);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        list($modal, $formData) = $this->repository->formGenerate(route($this->routeName.'.store'), __FUNCTION__);

        $form = $this->formBuilder->create($formData)->renderForm([], false, true, false);

        return $this->renderViewData(compact('modal', 'form'), __FUNCTION__);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $base = $this->repository->find($id);

        list($modal, $formData) = $this->repository->formGenerate(route($this->routeName.'.update', data_get($base, 'id', $id)), 'update', ['method' => 'patch']);

        $form = $this->formBuilder->create($formData, [
            'model' => $base
        ])->renderForm([], false, true, false);
        
        return $this->renderViewData(compact('modal', 'form'), __FUNCTION__);
    }
}
