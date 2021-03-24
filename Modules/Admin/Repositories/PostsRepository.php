<?php

namespace Modules\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\PostImagesModel;
use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Forms\PostsForm;
use Modules\Admin\Grids\PostsGridInterface;
use Modules\Core\Services\FileManagementService;

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

    public function create(array $attributes)
    {
        $fileService = resolve(FileManagementService::class);
        $fileData = $fileService->uploadFileImages([$attributes['post_image']]);
        $data['post_image'] = data_get($fileData, '0.file_name');
        unset($attributes['post_image']);
        $data_cat['category_id'] = $attributes['category_id'];

        $attributes['post_type'] = 'post';
        $attributes['post_date'] = now();
        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);
        $attributes['post_status'] = 1;

        return DB::transaction(function () use($attributes, $data, $data_cat) {
            $result = parent::create($attributes);

            $data['post_id'] = $result->id;
            resolve(PostImagesRepository::class)->updateOrCreate($data, ['post_id' => $result->id]);

            $data_cat['post_id'] = $result->id;
            resolve(PostCategoriesRepository::class)->updateOrCreate($data_cat, ['post_id' => $result->id]);

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
        $data_cat['category_id'] = $attributes['category_id'];

        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);

        return DB::transaction(function () use($attributes, $dataImage, $data_cat, $id) {
            $result = parent::update($attributes, $id);

            $dataImage['post_id'] = $result->id;
            resolve(PostImagesRepository::class)->updateOrCreate($dataImage, ['post_id' => $result->id]);

            $data_cat['post_id'] = $result->id;
            resolve(PostCategoriesRepository::class)->updateOrCreate($data_cat, ['post_id' => $result->id]);

            return $result;
        });
    }
}
