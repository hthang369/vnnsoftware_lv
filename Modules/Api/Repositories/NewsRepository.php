<?php

namespace Modules\Api\Repositories;

use Modules\Api\Entities\NewsModel;

class NewsRepository extends NewsBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsModel::class;
    }
}
