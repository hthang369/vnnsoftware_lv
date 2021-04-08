<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Img extends Component
{
    /**
    * @var string
    */
    public $size;

    /**
    * @var string
    */
    public $width;

    /**
    * @var string
    */
    public $height;

    /**
    * @var string
    */
    public $blank;

    /**
    * @var string
    */
    public $bgColor;

    /**
    * @var string
    */
    public $blankText;

    /**
    * @var string
    */
    public $src;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $height = null, $blank = false, $bgColor = null, $blankText = null, $src = '')
    {
        $this->width = $width;
        $this->height = $height;
        $this->blank = $blank;
        $this->bgColor = $bgColor ? "/$bgColor" : '';
        $this->blankText = $blankText ? "&text=$blankText" : '';
        $this->src = $src;
        $this->size = sprintf('%s%s', $width, ($height ? "x$height" : ''));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.img');
    }
}
