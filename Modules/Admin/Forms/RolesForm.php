<?php

namespace Modules\Admin\Forms;

use Spatie\Permission\Models\Role;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class RolesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('username', Field::TEXT)
            ->add('password', Field::PASSWORD)
            ->add('name', Field::TEXT);
            // ->add('email', Field::EMAIL);
            // ->add('role_list', 'checkbox_group', [
            //     'label' => 'Roles',
            //     'choices' => Role::pluck('name', 'level')->toArray()
            // ]);
    }
}
