<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardText extends Component
{
    /**
    * @var string
    */
    public $textTag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($textTag = 'p')
    {
        $this->textTag = $textTag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-text');
    }
}
