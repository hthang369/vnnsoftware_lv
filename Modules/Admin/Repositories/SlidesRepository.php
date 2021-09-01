<?php

namespace Modules\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\SlidesModel;
use Modules\Admin\Forms\SlidesForm;
use Modules\Admin\Grids\SlidesGrid;
use Modules\Core\Services\FileManagementService;

class SlidesRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SlidesModel::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return SlidesGrid::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return SlidesForm::class;
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

    public function formGenerate($route, $actionName, $config = [])
    {
        return parent::formGenerate($route, $actionName, ['enctype' => 'multipart/form-data']);
    }

    public function create(array $attributes)
    {
        $dataImageNew = $this->uploadFile($attributes, 'advertise_image');
        if ($dataImageNew)
            $attributes['advertise_image'] = $dataImageNew;
        $attributes['advertise_type'] = 'slide';
        return parent::create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return DB::transaction(function () use($attributes, $id) {
            $data = $this->find($id, ['advertise_image']);
            $dataImageNew = $this->uploadFile($attributes, 'advertise_image', null, false);
            if ($dataImageNew)
                $attributes['advertise_image'] = $dataImageNew;
            $base = parent::update($attributes, $id);
            $this->deleteFile($data['advertise_image']);
            return $base;
        });
    }
}
