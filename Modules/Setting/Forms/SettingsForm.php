<?php

namespace Modules\Setting\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class SettingsForm extends Form
{
    public function buildForm()
    {
        if ($this->getData('action') == 'edit') {
            $this->add('web_name', Field::TEXT, [
                'label' => trans('admin::configs.web_name'),
            ]);
            $this->add('web_address', Field::TEXT);
            $this->add('web_phone', Field::TEXT);
            $this->add('web_email', Field::EMAIL);
            $this->add('ob_title', Field::TEXT);
            $this->add('ob_desception', Field::TEXT);
            $this->add('ob_keyword', Field::TEXT);
            $this->add('save_info', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::configs.save_info'),
                'attr' => ['class' => 'btn btn-success']
            ]);
            $this->add('cancel_info', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::configs.cancel_info'),
                'attr' => ['class' => 'btn btn-secondary', 'formaction' => route('configs.index'), 'formmethod' => 'get']
            ]);
        } else {
            $this->add('web_name', Field::STATIC);
            $this->add('web_phone', Field::STATIC);
            $this->add('web_email', Field::STATIC);
            $this->add('ob_title', Field::STATIC);
            $this->add('ob_desception', Field::STATIC);
            $this->add('ob_keyword', Field::STATIC);
            $this->add('edit', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::common.edit'),
                'attr' => ['class' => 'btn btn-primary']
            ]);
        }
    }
}
