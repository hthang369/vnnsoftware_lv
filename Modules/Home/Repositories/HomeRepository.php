<?php

namespace Modules\Home\Repositories;

use Modules\Home\Entities\HomeModel;

class HomeRepository extends HomeBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HomeModel::class;
    }

}
