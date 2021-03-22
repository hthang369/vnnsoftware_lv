<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\AdvertisesModel;
use Modules\Admin\Forms\AdvertisesForm;
use Modules\Admin\Grids\AdvertisesGridInterface;
use Modules\Core\Services\FileManagementService;

class AdvertisesRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdvertisesModel::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return AdvertisesGridInterface::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return AdvertisesForm::class;
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
        $attributes['advertise_type'] = 'advertise';
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
