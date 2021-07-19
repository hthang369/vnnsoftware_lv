<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use App\Helpers\Attributes;
use App\Helpers\Classes;

class Textarea extends FormComponent
{
    public $type;

    public function __construct(
        $all = [],
        $group = [],
        $label = [],
        $name = '',
        $type = 'text',
        $help = '',
        $variant = '',
        $class = ''
    )
    {
        parent::__construct($all, $group, $label, $name, $type, $help, $variant, $class);
    }

    public function render()
    {
        return view('components.forms.textarea');
    }
}
