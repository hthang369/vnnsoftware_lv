<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\AdvertisesModel;
use Modules\Admin\Forms\AdvertisesForm;
use Modules\Admin\Grids\AdvertisesGridInterface;
use Modules\Admin\Repositories\AdvertisesCriteria;
use Modules\Admin\Repositories\AdvertisesRepository;
use Modules\Admin\Responses\AdvertisesResponse;
use Modules\Admin\Validators\AdvertisesValidator;
use Modules\Core\Http\Controllers\CoreController;

class AdvertisesController extends CoreController
{
    public function __construct(AdvertisesRepository $repository, AdvertisesValidator $validator, AdvertisesResponse $response, AdvertisesCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::advertises');
        $this->setRouteName('advertises');
        $this->setPathView([
            'create' => 'admin::advertises.advertise_modal'
        ]);
    }

    // public function store(Request $request)
    // {
    //     print_r($request->all());
    // }
}
