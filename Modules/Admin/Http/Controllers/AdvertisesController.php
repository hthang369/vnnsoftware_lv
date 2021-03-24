<?php

namespace Modules\Admin\Http\Controllers;

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
            'create' => 'admin::advertises.advertise_modal',
            'show' => 'admin::advertises.advertise_modal'
        ]);
    }

    // public function store(Request $request)
    // {
    //     print_r($request->all());
    // }
}
