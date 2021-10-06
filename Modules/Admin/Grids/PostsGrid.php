<?php

namespace Modules\Admin\Grids;

use Closure;
use Illuminate\Support\HtmlString;
use Vnnit\Core\Grids\BaseGridPresenter;

class PostsGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Posts';

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
            'id',
            [
                'key' => 'post_title',
                'label' => trans('admin::posts.post_title')
            ],
            [
                'key' => 'post_image',
                'label' => trans('admin::posts.post_image'),
            ],
            [
                'key' => 'category_id',
                'label' => trans('admin::posts.category_id'),
            ],
            [
                'key' => 'post_excerpt',
                'label' => trans('admin::posts.post_excerpt'),
            ],
            [
                'key' => 'post_date',
                'label' => trans('admin::posts.post_date'),
            ],
            [
                'key' => 'post_status',
                'label' => trans('admin::posts.post_status'),
            ],
        ];

                // 'data' => function ($columnData, $columnName) {
                //     // like for instance, displaying an image on the grid...
                //     return new HtmlString(sprintf('<img src="%s" class="img-responsive" alt = "%s" width="80">', asset('storage/images/'.$columnData->{$columnName}), 'alternative'));
                // },
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        // parent::configureButtons();
		// $this->editToolbarButton('create', [
        //     'dataAttributes' => ['modal-size' => 'modal-xl'],
        // ]);
        // $this->editRowButton('view', [
        //     'dataAttributes' => ['modal-size' => 'modal-xl'],
        // ]);
    }
}
