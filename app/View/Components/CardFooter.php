<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardFooter extends Component
{
    /**
    * @var string
    */
    public $footerTag;

    /**
    * @var string
    */
    public $footer;

    /**
    * @var string
    */
    public $bgVariant;

    /**
    * @var string
    */
    public $borderVariant;

    /**
    * @var string
    */
    public $textVariant;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($footer = null, $footerTag = 'div', $footerBgVariant = null, $footerborderVariant = null, $footertextVariant = null)
    {
        $this->footer = $footer;
        $this->footerTag = $footerTag;
        $this->bgVariant = $footerBgVariant;
        $this->borderVariant = $footerborderVariant;
        $this->textVariant = $footertextVariant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-footer');
    }
}
