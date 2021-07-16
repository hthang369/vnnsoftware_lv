<?php

namespace App\View\Components\Forms;

use App\Helpers\Attributes;
use App\Helpers\Classes;

class Select extends FormComponent
{
    public $type;
    public $options = [];

    public function __construct(
        $all = [],
        $group = [],
        $options = [],
        $label = [],
        $type = 'text',
        $name = '',
        $help = '',
        $variant = '',
        $class = ''
    )
    {
        parent::__construct($all, $group, $label, $name, $type, $help, $variant, $class);
        $this->type = $type ?: $all['type'] ?? '';
        $this->options = $options ?: $all['options'] ?? [];
        $this->attr = array_except($this->attr, ['type']);
    }

    public function render()
    {
        return view('components.forms.select');
    }
}
