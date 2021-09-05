<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\UsersModel;
use Modules\Admin\Forms\UsersForm;
use Modules\Admin\Grids\UsersGrid;

class UsersRepository extends AdminBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UsersModel::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return UsersGrid::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return UsersForm::class;
    }
}
