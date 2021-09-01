<?php

namespace Modules\Admin\Entities;

use Modules\Admin\Repositories\PostsRepository;
use Modules\Admin\Traits\NestedSetCategoryTrait;

class CategoriesModel extends AdminBaseModel
{
    use NestedSetCategoryTrait;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'category_excerpt',
        'category_link',
        'category_image',
        'parent_id',
        'category_lft',
        'category_rgt',
        'ob_title',
        'ob_desception',
        'ob_keyword',
        'category_status',
    ];

    public function getPostListAttribute()
    {
        return resolve(PostsRepository::class)->getAllDataByCategory($this->id, 8);
    }
}
