<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Facades\Breadcrumb;
use Modules\Admin\Grids\CategoriesGridInterface;
use Modules\Admin\Repositories\CategoriesCriteria;
use Modules\Admin\Repositories\CategoriesRepository;
use Modules\Admin\Validators\CategoriesValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class CategoriesController extends CoreController
{
    public function __construct(CategoriesRepository $repository, CategoriesValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::categories');
        $this->setRouteName('categories');
        $this->setPathView([
            'create' => 'admin::categories.category_modal',
            'show' => 'admin::categories.category_modal',
            'update' => 'categories.update',
            'store' => 'categories.store',
            'destroy' => 'categories.destroy',
        ]);
    }
}
