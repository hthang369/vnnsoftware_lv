<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class TableSort extends Component
{
    public $field;
    public $hrefUrl;
    public $sortIcon;
    public $styleColor;
    private $direction = [
        'asc'   => 'desc',
        'desc'  => 'asc'
    ];
    private $directionIcon = [
        'asc'   => 'fa-sort-up',
        'desc'  => 'fa-sort-down'
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field)
    {
        $this->field = $field;
        $this->hrefUrl = request()->fullUrlWithQuery([
            'sort' => $this->field,
            'direction' => str_is(request('sort'), $this->field) ? data_get($this->direction, request('direction')) : 'asc'
        ]);
        $this->styleColor = str_is(request('sort'), $this->field) ? 'blue' : 'gray';
        $this->sortIcon = !str_is(request('sort'), $this->field) ? 'fa-sort' : data_get($this->directionIcon, request('direction'));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.table-sort');
    }
}
