<?php

namespace Modules\Admin\Grids;

use Collective\Html\FormFacade;
use Modules\Admin\Facades\Menus;
use Vnnit\Core\Grids\BaseGridPresenter;

class MenusGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Menus';

    protected $shouldRenderFilters = false;

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
		    ],
		    "menu_name" => [
                'label' => trans('admin::menus.menu_name'),
		    ],
            "parent_id" => [
                'label' => trans('admin::menus.parent_id'),
		    ]
		];
    }

    public function renderSearchForm()
    {
        $menu_type = Menus::getMenuTypes();
        return '<div class="col-4">'.
            FormFacade::select('menu_type', $menu_type, request('type'), ['class' => 'custom-select', 'id' => 'menu_type'])
            .'</div>';
    }

    protected function setSortUrl(string $key, string $direction): void
    {
        $values = collect([
            $this->getGridSortParam() => $key,
            $this->getGridSortDirParam() => $direction
        ])->toArray();
        $params = array_merge(array_except(request()->query(), 'type'), $values);
        $this->sortUrl = route($this->getIndexRouteName(), $params);
    }
}
