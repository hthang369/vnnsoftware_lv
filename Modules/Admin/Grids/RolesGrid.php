<?php

namespace Modules\Admin\Grids;

use Closure;
use Illuminate\Support\HtmlString;
use Leantony\Grid\Grid;

class RolesGrid extends Grid implements RolesGridInterface
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Roles';

    /**
     * List of buttons to be generated on the grid
     *
     * @var array
     */
    protected $buttonsToGenerate = [
        'create',
        'view',
        'delete',
        'refresh'
    ];

    /**
     * Specify if the rows on the table should be clicked to navigate to the record
     *
     * @var bool
     */
    protected $linkableRows = false;

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

    /**
     * Set the links/routes. This are referenced using named routes, for the sake of simplicity
     *
     * @return void
     */
    public function setRoutes()
    {
        // searching, sorting and filtering
        $this->setIndexRouteName('role.index');

        // crud support
        $this->setCreateRouteName('role.create');
        $this->setViewRouteName('role.show');
        $this->setDeleteRouteName('role.destroy');

        // default route parameter
        $this->setDefaultRouteParameter('id');
    }

    /**
    * Return a closure that is executed per row, to render a link that will be clicked on to execute an action
    *
    * @return Closure
    */
    public function getLinkableCallback(): Closure
    {
        return function ($gridName, $item) {
            return route($this->getViewRouteName(), [$gridName => $item->id]);
        };
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        // call `addRowButton` to add a row button
        // call `addToolbarButton` to add a toolbar button
        // call `makeCustomButton` to do either of the above, but passing in the button properties as an array

        // call `editToolbarButton` to edit a toolbar button
        // call `editRowButton` to edit a row button
		// call `editButtonProperties` to do either of the above. All the edit functions accept the properties as an array
    }

    /**
    * Returns a closure that will be executed to apply a class for each row on the grid
    * The closure takes two arguments - `name` of grid, and `item` being iterated upon
    *
    * @return Closure
    */
    public function getRowCssStyle(): Closure
    {
        return function ($gridName, $item) {
            // e.g, to add a success class to specific table rows;
            // return $item->id % 2 === 0 ? 'table-success' : '';
            return "";
        };
    }
}
