<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\UsersModel;
use Modules\Admin\Forms\UsersForm;
use Modules\Admin\Grids\UsersGrid;

class UsersRepository extends AdminBaseRepository
{
    protected $presenterClass = UsersGrid::class;
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
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return UsersForm::class;
    }
}
