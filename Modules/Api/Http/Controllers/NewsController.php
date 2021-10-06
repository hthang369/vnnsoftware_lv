<?php

namespace Modules\Api\Http\Controllers;

use Modules\Api\Repositories\NewsCriteria;
use Modules\Api\Repositories\NewsRepository;
use Modules\Api\Responses\NewsResponse;
use Modules\Api\Validators\NewsValidator;
use Modules\Core\Http\Controllers\BaseController;

class NewsController extends BaseController
{
    protected $actionPermissionList = [
        'listNews' => 'public',
        'showNews' => 'public'
    ];

    public function __construct(NewsRepository $repository, NewsValidator $validator, NewsResponse $response, NewsCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
    }

    public function listNews()
    {
        return parent::index();
    }

    public function showNews($id)
    {
        return parent::show($id);
    }
}
