<?php

namespace Modules\Setting\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class SettingsMapForm extends Form
{
    public function buildForm()
    {
        if ($this->getData('action') == 'edit') {
            $this->add('web_map', Field::TEXTAREA, [
                'label' => trans('admin::configs.web_map'),
            ]);
            $this->add('save_info', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::configs.save_info'),
                'attr' => ['class' => 'btn btn-success']
            ]);
            $this->add('cancel_info', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::configs.cancel_info'),
                'attr' => ['class' => 'btn btn-secondary', 'formaction' => route('configs.index'), 'formmethod' => 'get']
            ]);
        } else {
            $this->add('web_map', 'maps', [
                'label' => trans('admin::configs.web_map'),
            ]);
            $this->add('edit', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::common.edit'),
                'attr' => ['class' => 'btn btn-primary']
            ]);
        }
    }
}
