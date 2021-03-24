<?php

namespace Modules\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\PagesModel;
use Modules\Admin\Entities\PostImagesModel;
use Modules\Admin\Forms\PagesForm;
use Modules\Admin\Grids\PagesGridInterface;
use Modules\Core\Services\FileManagementService;

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

    public function create(array $attributes)
    {
        $fileService = resolve(FileManagementService::class);
        $fileData = $fileService->uploadFileImages([$attributes['post_image']]);
        $data['post_image'] = data_get($fileData, '0.file_name');
        unset($attributes['post_image']);

        $attributes['post_type'] = 'page';
        $attributes['post_date'] = now();
        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);
        $attributes['post_status'] = 1;

        return DB::transaction(function () use($attributes, $data) {
            $result = parent::create($attributes);

            $data['post_id'] = $result->id;
            resolve(PostImagesRepository::class)->updateOrCreate($data, ['post_id' => $result->id]);

            return $result;
        });
    }

    public function update(array $attributes, $id)
    {
        $data = PostImagesModel::find($id, ['post_image']);
        $fileService = resolve(FileManagementService::class);
        $fileService->deleteFileType('images', $data['post_image']);
        $fileData = $fileService->uploadFileImages([$attributes['post_image']]);
        $dataImage['post_image'] = $fileData['file_name'];
        unset($attributes['post_image']);

        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);

        return DB::transaction(function () use($attributes, $dataImage, $id) {
            $result = parent::update($attributes, $id);

            $dataImage['post_id'] = $result->id;
            resolve(PostImagesRepository::class)->updateOrCreate($dataImage, ['post_id' => $result->id]);

            return $result;
        });
    }
}
