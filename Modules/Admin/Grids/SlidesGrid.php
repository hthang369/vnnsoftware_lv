<?php

namespace Modules\Admin\Grids;

use Closure;
use Illuminate\Support\HtmlString;
use Leantony\Grid\Grid;

class SlidesGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Slides';

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
		    "advertise_name" => [
                'label' => trans('admin::advertises.advertise_name'),
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "advertise_link" => [
                'label' => trans('admin::advertises.advertise_link'),
		        "search" => [
		            "enabled" => false
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "like"
		        ]
		    ],
		    "advertise_image" => [
                'label' => trans('admin::advertises.advertise_image'),
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
		];
    }
}
