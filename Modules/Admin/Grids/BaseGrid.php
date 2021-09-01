<?php

namespace Modules\Admin\Grids;

use Closure;
use Leantony\Grid\Grid;
use Leantony\Grid\GridInterface;
use Modules\Core\Facades\Common;

abstract class BaseGrid extends Grid implements BaseGridInterface
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = '';

    protected $sectionCode = '';

    public function getSectionCode()
    {
        if (empty($this->sectionCode))
            $this->sectionCode = Common::getSectionCode();

        return $this->sectionCode;
    }

    /**
     * Specify if the rows on the table should be clicked to navigate to the record
     *
     * @var bool
     */
    protected $linkableRows = false;

    protected function getActionButtons()
    {
        return array_keys(array_filter([
            'create' => user_can('add_'.$this->getSectionCode()),
            'view' => user_can('edit_'.$this->getSectionCode()),
            'delete' => user_can('delete_'.$this->getSectionCode()),
            'refresh' => user_can('view_'.$this->getSectionCode()),
            'export' => user_can('download_'.$this->getSectionCode())
        ]));
    }

    public function pageSize()
    {
        return null;
    }

    public function create(array $params): GridInterface
    {
        return parent::create(array_merge($params, ['paginationSize' => $this->pageSize()]));
    }

    public function setColumns()
    {
        return [];
    }

    /**
     * Set the links/routes. This are referenced using named routes, for the sake of simplicity
     *
     * @return void
     */
    public function setRoutes()
    {
        // searching, sorting and filtering
        if (in_array('refresh', $this->getActionButtons())) {
            $this->setIndexRouteName($this->getSectionCode().'.index');
        }

        // crud support
        if (in_array('create', $this->getActionButtons())) {
            $this->setCreateRouteName($this->getSectionCode().'.create');
        }
        if (in_array('view', $this->getActionButtons())) {
            $this->setViewRouteName($this->getSectionCode().'.show');
        }
        if (in_array('delete', $this->getActionButtons())) {
            $this->setDeleteRouteName($this->getSectionCode().'.destroy');
        }

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
        $this->buttonsToGenerate = $this->getActionButtons();
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
