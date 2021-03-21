<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\PagesModel;
use Modules\Admin\Forms\PagesForm;
use Modules\Admin\Grids\PagesGridInterface;

class PagesRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PagesModel::class;
    }
    
    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return PagesGridInterface::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return PagesForm::class;
    }
}
