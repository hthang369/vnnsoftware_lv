<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use App\Helpers\Attributes;
use App\Helpers\Classes;

class Checkbox extends FormComponent
{
    public $type;
    public $validation = [];

    public function __construct(
        $all = [],
        $group = [],
        $label = [],
        $validation = [],
        $help = '',
        $name = '',
        $variant = '',
        $class = '',
        $caption = '',
    )
    {
        parent::__construct($all, $group, $label, $name, '', $help, $variant, $class);
        if (is_string($caption)) {
            $caption = ['text'  => $caption];
        }
        $this->validation = $validation ?: $all['validation'] ?? [];
        $this->caption = $caption ?: $all['caption'] ?? [];
        $this->attr = array_except($this->attr, ['type']);
        $this->attrs['class'] = Classes::get([
            'custom-control-input',
            $this->attrs['class'],
            isset($this->validation['type']) ? 'is-' . $this->validation['type'] : ''
        ]);
        $this->caption['class'] = Classes::get([
            'custom-control-label',
            $this->caption
        ]);
        $this->caption['attrs'] = Attributes::get($this->caption, ['text', 'class']);
    }

    public function render()
    {
        return view('components.forms.checkbox');
    }
}
