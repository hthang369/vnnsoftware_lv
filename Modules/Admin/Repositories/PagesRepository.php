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

    /**
     * Specify Service class name
     *
     * @return string
     */
    public function service()
    {
        return FileManagementService::class;
    }

    public function create(array $attributes)
    {
        $attributes['post_type'] = 'page';
        $attributes['post_date'] = now();
        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);
        $attributes['post_status'] = 1;

        return DB::transaction(function () use($attributes) {
            $result = parent::create($attributes);

            $dataImageNew = $this->uploadFile($attributes, 'post_image');
            if ($dataImageNew) {
                $data['post_id'] = $result->id;
                $data['post_image'] = $dataImageNew;
                resolve(PostImagesRepository::class)->updateOrCreate($data, ['post_id' => $result->id]);
            }

            return $result;
        });
    }

    public function update(array $attributes, $id)
    {
        $data = PostImagesModel::find($id, ['post_image']);
        $dataImageOld = $data['post_image'];

        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);

        return DB::transaction(function () use($attributes, $dataImageOld, $id) {
            $result = parent::update($attributes, $id);

            $dataImageNew = $this->uploadFile($attributes, 'post_image', $dataImageOld);
            if ($dataImageNew) {
                $dataImage['post_id'] = $result->id;
                $dataImage['post_image'] = $dataImageNew;
                resolve(PostImagesRepository::class)->updateOrCreate($dataImage, ['post_id' => $result->id]);
            }

            return $result;
        });
    }
}
