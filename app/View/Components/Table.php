<?php

namespace App\View\Components;

use App\Helpers\Attributes;
use App\Helpers\Classes;
use Illuminate\View\Component;

class Table extends Component
{
    public $striped;
    public $bordered;
    public $borderless;
    public $outlined;
    public $small;
    public $hover;
    public $fixed;
    public $responsive;
    public $noBorderCollapse;
    public $items;
    public $fields;
    public $total;
    public $pages;
    public $currentPage;
    public $showingResult;
    public $attrs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $total, $pages, $currentPage, $from, $to,
        $fields = null, $striped = false, $bordered = false, $hover = false)
    {
        $this->attrs = [
            'class' => Classes::get([
                'table',
                $striped ? 'table-striped' : '',
                $bordered ? 'table-bordered' : '',
                $hover ? 'table-hover' : ''
            ])
        ];
        $this->fields = Attributes::getFields($fields, $items);
        $this->items = $items;
        $this->total = $total;
        $this->pages = $pages;
        $this->currentPage = $currentPage;
        $this->showingResult = sprintf(trans('table.show_result'), $from, $to, $total);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
