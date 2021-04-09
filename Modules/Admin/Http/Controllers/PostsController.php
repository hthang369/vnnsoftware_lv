<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Forms\PostsForm;
use Modules\Admin\Grids\PostsGridInterface;
use Modules\Admin\Repositories\PostsCriteria;
use Modules\Admin\Repositories\PostsRepository;
use Modules\Admin\Responses\PostsResponse;
use Modules\Admin\Validators\PostsValidator;
use Modules\Core\Http\Controllers\CoreController;

class PostsController extends CoreController
{
    public function __construct(PostsRepository $repository, PostsValidator $validator, PostsResponse $response, PostsCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::posts');
        $this->setRouteName('posts');
        $this->setPathView([
            'create' => 'admin::posts.post_modal',
            'show' => 'admin::posts.post_modal'
        ]);
    }

}
