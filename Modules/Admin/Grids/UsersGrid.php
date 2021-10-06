<?php

namespace Modules\Admin\Grids;

use Closure;
use Illuminate\Support\HtmlString;
use Spatie\Permission\Models\Role;
use Vnnit\Core\Grids\BaseGridPresenter;

class UsersGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Users';

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
		    "username" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
            "name" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "email" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "roles" => [
		        "sort" => false,
                'raw' => true,
                'data' => function ($columnData, $columnName) {
                    $data = $columnData->getRoles()->pluck('name')->map(function($item) {
                        return '<span class="badge badge-primary">'.$item.'</span>';
                    })->join(' ');
                    return new HtmlString($data);
                },
		        "filter" => [
		            "enabled" => true,
		            "type" => "select",
                    'data' => Role::pluck('name', 'id')
		        ]
		    ]
		];
    }
}
