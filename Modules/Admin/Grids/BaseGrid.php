<?php

namespace Modules\Admin\Grids;

use Vnnit\Core\Grids\BaseGridPresenter;

class BaseGrid extends BaseGridPresenter
{
    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    protected function configureButtons()
    {
        parent::configureButtons();
        $this->editRowButton('edit', [
            'renderCustom' => '',
            'mergeClass' => ['grid-row-button', 'show_modal_form']
        ]);
    }

    protected function visibleDetail($item)
    {
        return false;
    }
}
