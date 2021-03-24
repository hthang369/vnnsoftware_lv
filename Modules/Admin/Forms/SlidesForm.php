<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class SlidesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('advertise_name', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('advertise_link', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('advertise_image', Field::FILE);
    }
}
