<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardGroup extends Component
{
    /**
    * @var string
    */
    public $cardGroup;

    /**
    * @var bool
    */
    public $deck;

    /**
    * @var bool
    */
    public $columns;

    /**
    * @var bool
    */
    public $grids;

    /**
    * @var string
    */
    public $tag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag = 'div', $deck = false, $columns = false, $grids = false, $gridCols = 1, $gridSm = false, $gridMd = false, $gridLg = false, $gridXl = false)
    {
        $this->tag = $tag;
        $cardGroup = 'card-group';
        if ($deck) $cardGroup = 'card-deck';
        if ($columns) $cardGroup = 'card-columns';
        if ($grids) {
            $gridDevice = ['row', "row-cols-$gridCols"];
            if ($gridSm) array_push($gridDevice, "row-cols-sm-$gridCols");
            if ($gridMd) array_push($gridDevice, "row-cols-md-$gridCols");
            if ($gridLg) array_push($gridDevice, "row-cols-lg-$gridCols");
            if ($gridXl) array_push($gridDevice, "row-cols-xl-$gridCols");
            $cardGroup = implode(' ', $gridDevice);
        }
        $this->cardGroup = $cardGroup;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-group');
    }
}
