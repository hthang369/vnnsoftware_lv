<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\AdvertisesModel;
use Modules\Admin\Forms\AdvertisesForm;
use Modules\Admin\Grids\AdvertisesGridInterface;

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
        $attributes['advertise_image'] = $fileData['file_name'];
        return parent::create($attributes);
    }

    public function update(array $attributes, $id)
    {
        // $attributes['category_status'] = 1;
        // parent::update($attributes, $id);
    }
}
