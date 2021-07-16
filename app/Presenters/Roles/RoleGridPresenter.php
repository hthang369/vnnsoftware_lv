<?php

namespace App\Presenters\Roles;

use App\Presenters\BaseGridPresenter;

class RoleGridPresenter extends BaseGridPresenter
{
    protected function setColumns()
    {
        return [
            'level',
            'name',
            'role_rank',
            [
                'key'   => 'role_setting',
                'label' => __('custom_label.role_setting'),
                'cell'  => 'roles.permission'
            ]
        ];
    }
}
