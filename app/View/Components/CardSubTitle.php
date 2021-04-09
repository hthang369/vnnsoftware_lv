<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardSubTitle extends Component
{
    /**
    * @var string
    */
    public $subTitleTag;

    /**
    * @var string
    */
    public $subTitle;

    /**
    * @var string
    */
    public $subTitleVariant;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subTitle = null, $subTitleTag = 'h6', $subTitleTextVariant = '')
    {
        $this->subTitle = $subTitle;
        $this->subTitleTag = $subTitleTag;
        $this->subTitleVariant = $subTitleTextVariant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-sub-title');
    }
}
