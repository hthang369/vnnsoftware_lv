<?php

namespace Modules\Admin\Grids;

use Closure;
use Illuminate\Support\HtmlString;
use Vnnit\Core\Grids\BaseGridPresenter;

class NewsGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'News';

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        $this->columns = [
		    "id" => [
		        "label" => "ID",
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "grid-w-10"
		        ]
		    ],
		    "post_title" => [
                'label' => trans('admin::posts.post_title'),
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
            "post_image" => [
                'label' => trans('admin::posts.post_image'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
                ],
                'raw' => true,
                'data' => function ($columnData, $columnName) {
                    // like for instance, displaying an image on the grid...
                    return new HtmlString(sprintf('<img src="%s" class="img-responsive" alt = "%s" width="80">', asset('storage/images/'.$columnData->{$columnName}), 'alternative'));
                },
		    ],
            "category_id" => [
                'label' => trans('admin::posts.category_id'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
		        ]
		    ],
		    "post_excerpt" => [
                'label' => trans('admin::posts.post_excerpt'),
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "like"
		        ]
		    ],
		    "post_date" => [
                'label' => trans('admin::posts.post_date'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
		        ]
		    ],
		    "post_status" => [
                'label' => trans('admin::posts.post_status'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
		        ]
		    ]
		];
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        parent::configureButtons();
		$this->editToolbarButton('create', [
            'dataAttributes' => ['modal-size' => 'modal-xl'],
        ]);
        $this->editRowButton('view', [
            'dataAttributes' => ['modal-size' => 'modal-xl'],
        ]);
    }
}
