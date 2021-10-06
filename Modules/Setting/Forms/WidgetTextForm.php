<?php

namespace Modules\Setting\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class WidgetTextForm extends Form
{
    public function buildForm()
    {
        $this->add('name', Field::TEXT)
            ->add('save_widget', Field::BUTTON_SUBMIT, [
                'label' => trans('setting::configs.save_info'),
                'attr' => ['class' => 'btn btn-success']
            ]);
    }
}
