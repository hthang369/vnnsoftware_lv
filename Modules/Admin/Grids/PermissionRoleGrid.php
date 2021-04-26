<?php

namespace Modules\Admin\Grids;

use Closure;
use Collective\Html\FormFacade;
use Illuminate\Support\HtmlString;
use Leantony\Grid\Grid;

class PermissionRoleGrid extends Grid implements PermissionRoleGridInterface
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Permission Role';

    /**
     * List of buttons to be generated on the grid
     *
     * @var array
     */
    protected $buttonsToGenerate = [
        'save',
        // 'view',
        // 'delete',
        // 'refresh',
        // 'export'
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
		    "no" => [
		        "label" => "ID",
		        "filter" => [
		            "enabled" => false,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "grid-w-10"
		        ]
		    ],
		    "section_code" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => false,
		        ]
		    ],
		    "action" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => false,
                ],
                'raw' => true,
                'data' => function ($columnData, $columnName) {
                    $permissions = json_decode($columnData['permission'], true);
                    $section_actions = config('permission.section_action');
                    $actions = config('permission.actions');
                    $listAction = [];
                    foreach($permissions as $key => $value) {
                        if (!in_array($key, data_get($section_actions, $columnData['section_code'], $actions))) continue;
                        $name = sprintf('%s[%s]', $columnData['section_code'], $key);
                        $listAction[] = FormFacade::checkbox($name, $value, $value, ['id' => $name]).
                        FormFacade::label($name, $key);
                    }
                    return new HtmlString(implode(' &nbsp; ', $listAction));
                    // like for instance, displaying an image on the grid...
                    // return new HtmlString(sprintf('<img src="%s" class="img-responsive" alt = "%s" width="40">', asset('storage/data/upload/images/'.$columnData->{$columnName}), 'alternative'));
                },
		    ]

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
        $this->setIndexRouteName('role_has_permissions.index');

        // crud support
        $this->setCreateRouteName('role_has_permissions.create');
        $this->setViewRouteName('role_has_permissions.show');
        // $this->setDeleteRouteName('role_has_permissions.destroy');

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
        $this->clearAllButtons();
        // call `addRowButton` to add a row button
        // call `addToolbarButton` to add a toolbar button
        // call `makeCustomButton` to do either of the above, but passing in the button properties as an array
        $this->makeCustomButton([
            'name' => 'Save',
            'url' => 'abc',
        ], static::$TYPE_TOOLBAR);
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
