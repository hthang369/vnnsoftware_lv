<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\SlidesCriteria;
use Modules\Admin\Repositories\SlidesRepository;
use Modules\Admin\Responses\SlidesResponse;
use Modules\Admin\Validators\SlidesValidator;
use Modules\Core\Http\Controllers\CoreController;

class SlidesController extends CoreController
{
    public function __construct(SlidesRepository $repository, SlidesValidator $validator, SlidesResponse $response, SlidesCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::slides');
        $this->setRouteName('slides');
        $this->setPathView([
            'create' => 'admin::slides.slide_modal',
            'show' => 'admin::slides.slide_modal'
        ]);
    }

    // public function store(Request $request)
    // {
    //     print_r($request->all());
    // }
}
