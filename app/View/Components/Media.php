<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Media extends Component
{
    /**
    * @var string
    */
    public $tag;

    /**
    * @var string
    */
    public $aside;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag = 'div', $aside = null)
    {
        $this->tag = $tag;
        $this->aside = $aside;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.media');
    }
}
