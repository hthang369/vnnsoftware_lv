<?php

namespace Modules\Admin\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Spatie\Permission\Models\Role;

class UsersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('username', Field::TEXT)
            ->add('password', Field::PASSWORD)
            ->add('name', Field::TEXT)
            ->add('email', Field::EMAIL)
            ->add('role_list', 'checkbox_group', [
                'label' => 'Roles',
                'choices' => Role::pluck('name', 'level')->toArray()
            ]);
    }
}
