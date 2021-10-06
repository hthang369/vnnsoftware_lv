<?php

namespace Modules\Admin\Grids;

use Closure;
use Vnnit\Core\Grids\BaseGridPresenter;

class CategoriesGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Categories';
    // protected $indexColumnOptions = ['visible' => false];
    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
		    "category_name",
            // "parent_name",
		    "category_link",
		    "category_status"
		];
    }
}
