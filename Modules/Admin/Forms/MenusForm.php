<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CategoriesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('category_name', Field::TEXT)
            ->add('category_excerpt', Field::TEXT)
            ->add('category_link', Field::TEXT)
            ->add('parent_id', Field::SELECT);
    }
}
