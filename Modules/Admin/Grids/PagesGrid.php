<?php

namespace Modules\Admin\Grids;

use Closure;
use Vnnit\Core\Grids\BaseGridPresenter;

class PagesGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Pages';

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
