<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PostsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('post_title', Field::TEXT)
            ->add('post_excerpt', Field::TEXT)
            ->add('post_link', Field::TEXT)
            ->add('category_id', Field::SELECT, [
                'choices' => [],
                'selected' => '',
                'empty_value' => '=== Select category ==='
            ])
            ->add('post_image', Field::FILE)
            ->add('post_content', Field::TEXTAREA)
            ->add('ob_title', Field::TEXT)
            ->add('ob_desception', Field::TEXT)
            ->add('ob_keyword', Field::TEXT);
    }
}
