<?php

namespace App\View\Components\Forms;

use App\Helpers\Attributes;
use App\Helpers\Classes;
use Illuminate\View\Component;

abstract class FormComponent extends Component
{
    public $variant;
    public $help;
    public $group = [];
    public $label = [];
    public $attrs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        if (is_string($label)) {
            $label = ['text'  => $label];
        }
        $inlineGroup = $group ?: $all['group'] ?? [];
        $this->label = $label ?: $all['label'] ?? [];
        $this->help = $help ?: $all['help'] ?? '';
        $this->variant = $variant ?: $all['variant'] ?? '';

        $this->label['class'] = Classes::get([
            'col-sm-2 col-form-label',
            $label
        ]);

        $this->attrs = [
            'class' => $class ?: $all['class'] ?? '',
            'type' => $type ?: $all['type'] ?? 'text',
        ];
        if (!blank($group) && str_contains($group, 'row')) {
            $this->attrs = array_add($this->attrs, 'inputClass', 'col-sm-10');
        }

        $defaultClass = strpos($this->attrs['class'], 'form-control-plaintext') !== 0 ? 'form-control' : 'form-control-plaintext';
        $this->attrs['class'] = Classes::get([
            $defaultClass,
            $this->attrs['class'],
        ]);
        $this->group['class'] = Classes::get([
            'form-group',
            $inlineGroup
        ]);
        $this->group['attrs'] = Attributes::get($this->group);
        $this->attrs = array_filter($this->attrs);
        $this->attrs['name'] = $name ?: $all['name'] ?? '';
    }
}
