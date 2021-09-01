<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\NewsCriteria;
use Modules\Admin\Repositories\NewsRepository;
use Modules\Admin\Responses\NewsResponse;
use Modules\Admin\Validators\NewsValidator;
use Modules\Core\Http\Controllers\CoreController;

class NewsController extends CoreController
{
    public function __construct(NewsRepository $repository, NewsValidator $validator, NewsResponse $response, NewsCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::news');
        $this->setRouteName('news');
        $this->setPathView([
            'create' => 'admin::news.news_modal',
            'show' => 'admin::news.news_modal'
        ]);
    }
}
