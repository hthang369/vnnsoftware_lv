<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionBox extends Component
{
    /**
    * @var string
    */
    public $title;

    /**
    * @var string
    */
    public $wrapper;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $wrapper = null)
    {
        $this->title = $title;
        $this->wrapper = $wrapper ?? 'container';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section-box');
    }
}
