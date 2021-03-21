<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PagesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('post_title', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('post_excerpt', Field::TEXT)
            ->add('post_link', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('categories', Field::SELECT, [
                'choices' => [],
                'selected' => '',
                'empty_value' => '=== Select category ==='
            ])
            ->add('post_content', Field::TEXTAREA);
    }
}
