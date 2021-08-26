<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Admin\Entities\CategoriesModel;

class CategoriesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('category_name', Field::TEXT)
            ->add('category_excerpt', Field::TEXT)
            ->add('category_link', Field::TEXT)
            ->add('parent_id', Field::SELECT, [
                'choices' => CategoriesModel::whereNull('parent_id')->pluck('category_name', 'id')->toArray(),
                'selected' => '',
                'empty_value' => '=== Select category ==='
            ]);
    }
}
