<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardHeader extends Component
{
    /**
    * @var string
    */
    public $headerTag;

    /**
    * @var string
    */
    public $header;

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
    public function __construct($header = null, $headerTag = 'div', $headerBgVariant = null, $headerborderVariant = null, $headertextVariant = null)
    {
        $this->header = $header;
        $this->headerTag = $headerTag;
        $this->bgVariant = $headerBgVariant;
        $this->borderVariant = $headerborderVariant;
        $this->textVariant = $headertextVariant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-header');
    }
}
