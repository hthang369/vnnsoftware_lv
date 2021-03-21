<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\AdminModel;

class AdminRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminModel::class;
    }
}
