<?php

namespace App\View\Components;

use App\Helpers\Classes;
use Illuminate\View\Component;

class StripeNav extends Component
{
    public $all;
    public $links;
    public $attrs;
    public $slot1;
    public $slot2;

    public function __construct(
        $all = [],
        $links = [],
        $class = ''
    )
    {
        $this->all = $all ?? '';
        $this->links = $links ?: $all['links'] ?? '';
        $this->attrs = [
            'class' => $class ?: $all['class'] ?? '',
        ];
        $this->attrs['class'] = Classes::get([
            'stripe-nav',
            $this->attrs['class']
        ]);
        $this->attrs = \array_filter($this->attrs);
    }

    public function render()
    {
        return view('components.stripe-nav');
    }
}
