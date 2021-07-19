<?php

namespace App\View\Components;

use App\Helpers\Classes;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $childs;
    public $attrs;
    public $current;
    public $total;
    public $next;
    public $prev;
    public $pages;
    public $links;
    private $startPage = 1;
    private $numberOfPage = 5;
    private $firstNumber = false;
    private $lastNumber = false;

    public function __construct(
        $all = [],
        $current = '',
        $total = '',
        $next = [],
        $prev = [],
        $pages = '',
        $class = ''
    )
    {
        $this->childs = $all ?? [];
        $this->current = $current ?: $all['current'] ?? 0;
        $this->total = $total ?: $all['total'] ?? 0;
        $this->pages = $pages ?: $all['pages'] ?? 0;
        $this->next = $next ?: $all['next'] ?? $this->getNextUrl($this->current);
        $this->prev = $prev ?: $all['prev'] ?? $this->getPrevUrl($this->current);
        $this->attrs['class'] = Classes::get([
            'pagination',
            'class' => $class ?: $all['class'] ?? '',
        ]);
        $this->attrs = \array_filter($this->attrs);
        $this->links = $this->getLinks();
        data_set($this->next, 'text', '<i class="fas fa-angle-right"></i>');
        data_set($this->prev, 'text', '<i class="fas fa-angle-left"></i>');
    }

    private function getLinks()
    {
        $endPage = $this->current + 2;
        $diff = $this->pages - $endPage;

        $start = max($this->current - 2, $this->startPage);
        if ($diff < 0)
            $start += $diff;

        $end = $start + min($this->numberOfPage, $this->pages) - 1;

        if ($start < 0) $start = $this->startPage;
        if ($end < 0) $end = $this->startPage;

        $links = collect(array_filter(range($start, $end)))->mapWithKeys(function ($page, $index) {
            return [$page => $this->getUrl($page, $index)];
        });

        if ($this->firstNumber) {
            $links->prepend($this->getUrl($this->startPage, null));
        }
        if ($this->lastNumber) {
            $links->push($this->getUrl($this->pages, null));
        }

        return $links->all();
    }

    private function getUrl($page, $index)
    {
        $label = $page;
        $url = url()->current()."?page={$page}";
        if ($index === 0 && $page != $this->startPage) {
            $this->firstNumber = true;
            $label = '...';
            $url = '';
        }
        if ($index === ($this->numberOfPage - 1) && $page != $this->pages) {
            $this->lastNumber = true;
            $label = '...';
            $url = '';
        }

        return [
            'label'  => $label,
            'url'    => $url,
            'active' => $this->current == $page
        ];
    }

    private function getPrevUrl($current)
    {
        $prevCurrent = $current - 1;
        return $prevCurrent < 0 ? [] : ['href' => url()->current()."?page={$prevCurrent}"];
    }

    private function getNextUrl($current)
    {
        $nextCurrent = $current + 1;
        return $nextCurrent > $this->pages ? [] : ['href' => url()->current()."?page={$nextCurrent}"];
    }

    public function render()
    {
        return view('components.pagination');
    }
}
