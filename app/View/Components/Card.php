<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
    * @var string
    */
    public $title;

    /**
    * @var string
    */
    public $header;

    /**
    * @var string
    */
    public $footer;

    /**
    * @var string
    */
    public $subTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
