<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PostsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('post_title', 'text')
            ->add('post_excerpt', 'text')
            ->add('post_link', 'text')
            ->add('post_content', 'textarea');
    }
}
