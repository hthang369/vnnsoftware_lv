<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ConfigsHomeForm extends Form
{
    public function buildForm()
    {
        if ($this->getData('action') == 'edit') {
            $this->add('web_favicon', Field::FILE, [
                'label' => trans('admin::configs.web_favicon'),
            ]);
            $this->add('web_logo', Field::FILE, [
                'label' => trans('admin::configs.web_logo'),
            ]);
            $this->add('web_banner', Field::FILE, [
                'label' => trans('admin::configs.web_banner'),
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
            $this->add('web_favicon', 'image_file', [
                'label' => trans('admin::configs.web_favicon'),
            ]);
            $this->add('web_logo', 'image_file', [
                'label' => trans('admin::configs.web_logo'),
            ]);
            $this->add('web_banner', 'image_file', [
                'label' => trans('admin::configs.web_banner'),
            ]);
            $this->add('edit', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::common.edit'),
                'attr' => ['class' => 'btn btn-primary']
            ]);
        }
    }
}
