<?php

namespace App\View\Components\Forms;

class Input extends FormComponent
{
    public function __construct(
        $all = [],
        $group = [],
        $label = [],
        $name = '',
        $type = '',
        $help = '',
        $variant = '',
        $class = ''
    )
    {
        parent::__construct($all, $group, $label, $name, $type, $help, $variant, $class);
    }

    public function render()
    {
        return view('components.forms.input');
    }
}
