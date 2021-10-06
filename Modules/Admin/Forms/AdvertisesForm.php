<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class AdvertisesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('advertise_name', Field::TEXT)
            ->add('advertise_link', Field::TEXT)
            ->add('advertise_image', Field::FILE);
    }
}
