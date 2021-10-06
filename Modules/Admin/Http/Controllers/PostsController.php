<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Facades\Breadcrumb;
use Modules\Admin\Repositories\PostsRepository;
use Modules\Admin\Validators\PostsValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class PostsController extends CoreController
{
    public function __construct(PostsRepository $repository, PostsValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::posts');
        $this->setRouteName('posts');
        $this->setPathView([
            'create' => 'admin::posts.post_modal',
            'show' => 'admin::posts.post_modal'
        ]);
        Breadcrumb::add(__('admin::menus.posts'), null);
    }

}
