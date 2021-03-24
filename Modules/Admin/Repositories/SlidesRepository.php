<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\SlidesModel;
use Modules\Admin\Forms\SlidesForm;
use Modules\Admin\Grids\SlidesGridInterface;
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
        return SlidesGridInterface::class;
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

    public function formGenerate($route, $actionName, $config = [])
    {
        return parent::formGenerate($route, $actionName, ['enctype' => 'multipart/form-data']);
    }

    public function create(array $attributes)
    {
        $fileService = resolve(FileManagementService::class);
        $fileData = $fileService->uploadFileImages([$attributes['advertise_image']]);
        $attributes['advertise_image'] = data_get($fileData, '0.file_name');
        $attributes['advertise_type'] = 'silde';
        return parent::create($attributes);
    }

    public function update(array $attributes, $id)
    {
        $data = $this->find($id, ['advertise_image']);
        $fileService = resolve(FileManagementService::class);
        $fileService->deleteFileType('images', $data['advertise_image']);
        $fileData = $fileService->uploadFileImages([$attributes['advertise_image']]);
        $attributes['advertise_image'] = $fileData['file_name'];
        return parent::update($attributes, $id);
    }
}
