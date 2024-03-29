<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toasts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // print_r(debug_print_backtrace());exit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toasts');
    }
}
