<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Forms\CategoriesForm;
use Modules\Admin\Grids\CategoriesGridInterface;
use Modules\Admin\Repositories\CategoriesCriteria;
use Modules\Admin\Repositories\CategoriesRepository;
use Modules\Admin\Responses\CategoriesResponse;
use Modules\Admin\Validators\CategoriesValidator;
use Modules\Core\Http\Controllers\CoreController;

class CategoriesController extends CoreController
{
    public function __construct(CategoriesRepository $repository, CategoriesValidator $validator, CategoriesResponse $response, CategoriesCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::categories');
        $this->setRouteName('categories');
        $this->setPathView([
            'create' => 'admin::categories.category_modal',
            'show' => 'admin::categories.category_modal'
        ]);
    }
}
