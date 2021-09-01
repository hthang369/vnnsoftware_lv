<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\NewsModel;
use Modules\Admin\Forms\NewsForm;
use Modules\Admin\Grids\NewsGrid;
use Modules\Core\Services\FileManagementService;

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

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return NewsGrid::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return NewsForm::class;
    }

    /**
     * Specify Service class name
     *
     * @return string
     */
    public function service()
    {
        return FileManagementService::class;
    }
}
