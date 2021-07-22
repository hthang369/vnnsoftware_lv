<?php

namespace App\View\Components;

use App\Helpers\Classes;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($variant, $type = 'button', $size = '', $name = '')
    {
        $this->type = $type;
        $this->class = Classes::get([
            'btn',
            "btn-{$variant}",
            empty($size) ? '' : "btn-{$size}"
        ]);
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
