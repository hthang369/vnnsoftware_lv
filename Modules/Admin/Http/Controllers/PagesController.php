<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\PagesModel;
use Modules\Admin\Forms\PagesForm;
use Modules\Admin\Grids\PagesGridInterface;
use Modules\Admin\Repositories\PagesCriteria;
use Modules\Admin\Repositories\PagesRepository;
use Modules\Admin\Responses\PagesResponse;
use Modules\Admin\Validators\PagesValidator;
use Modules\Core\Http\Controllers\CoreController;

class PagesController extends CoreController
{
    public function __construct(PagesRepository $repository, PagesValidator $validator, PagesResponse $response, PagesCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::pages');
        $this->setRouteName('pages');
        $this->setPathView([
            'create' => 'admin::pages.page_modal'
        ]);
    }

}
