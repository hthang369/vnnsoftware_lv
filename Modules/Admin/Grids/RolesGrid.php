<?php

namespace Modules\Admin\Grids;

use Closure;
use Illuminate\Support\HtmlString;
use Leantony\Grid\Grid;

class RolesGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Roles';

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
		            "enabled" => true,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "grid-w-10"
		        ]
		    ],
		    "level" => [
                'label' => trans('admin::roles.role_level'),
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "name" => [
                'label' => trans('admin::roles.role_name'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "like"
                ],
                'raw' => true,
                'data' => function ($columnData, $columnName) {
                    // like for instance, displaying an image on the grid...
                    return new HtmlString(sprintf('<a href="%s">%s</a>', route('role_has_permissions.show',$columnData->id), $columnData->{$columnName}));
                },
		    ],
            "updated_at" => [
                'label' => trans('admin::roles.advertise_link'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "like"
		        ]
		    ],
		    "role_rank" => [
                'label' => trans('admin::roles.advertise_image'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
                ]
		    ],
		    "users_count" => [
                'label' => trans('admin::roles.advertise_image'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
                ]
		    ],
		];
    }
}