<?php

namespace App\View\Components;

use App\Helpers\Classes;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $attrs;
    public $pages;
    public $currentPage;

    public function __construct(
        $all = [],
        $class = '',
        $currentPage = '',
        $pages = []
    )
    {
        $this->currentPage = $currentPage ?: $all['currentPage'] ?? '';
        $this->pages = $pages ?: $all['pages'] ?? [];
        $this->attrs = [
            'class' => $class ?: $all['class'] ?? '',
        ];
        $this->attrs['class'] = Classes::get([
            'breadcrumb',
            $this->attrs['class']
        ]);
        $this->attrs = \array_filter($this->attrs);
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}
