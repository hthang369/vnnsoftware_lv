<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Forms\PostsForm;
use Modules\Admin\Grids\PostsGridInterface;

class PostsRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostsModel::class;
    }
    
    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return PostsGridInterface::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return PostsForm::class;
    }
}
