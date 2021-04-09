<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardTitle extends Component
{
    /**
    * @var string
    */
    public $titleTag;

    /**
    * @var string
    */
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $titleTag = 'h4')
    {
        $this->titleTag = $titleTag;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-title');
    }
}
