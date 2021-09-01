<?php

namespace Modules\Setting\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class SettingsHomeForm extends Form
{
    public function buildForm()
    {
        if ($this->getData('action') == 'edit') {
            $this->add('web_favicon', Field::FILE, [
                'label' => trans('setting::configs.web_favicon'),
            ]);
            $this->add('web_logo', Field::FILE, [
                'label' => trans('setting::configs.web_logo'),
            ]);
            $this->add('web_banner', Field::FILE, [
                'label' => trans('setting::configs.web_banner'),
            ]);
            $this->add('save_info', Field::BUTTON_SUBMIT, [
                'label' => trans('setting::configs.save_info'),
                'attr' => ['class' => 'btn btn-success']
            ]);
            $this->add('cancel_info', Field::BUTTON_SUBMIT, [
                'label' => trans('setting::configs.cancel_info'),
                'attr' => ['class' => 'btn btn-secondary', 'formaction' => route('setting.index'), 'formmethod' => 'get']
            ]);
        } else {
            $this->add('web_favicon', 'image_file', [
                'label' => trans('setting::configs.web_favicon'),
                'src' => 'storage/images/',
                'width' => '150'
            ]);
            $this->add('web_logo', 'image_file', [
                'label' => trans('setting::configs.web_logo'),
                'src' => 'storage/images/',
                'width' => '150'
            ]);
            $this->add('web_banner', 'image_file', [
                'label' => trans('setting::configs.web_banner'),
                'src' => 'storage/images/',
                'width' => '150'
            ]);
            $this->add('edit', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::common.edit'),
                'attr' => ['class' => 'btn btn-primary']
            ]);
        }
    }
}
