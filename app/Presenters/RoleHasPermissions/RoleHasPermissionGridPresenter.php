<?php

namespace App\Presenters\RoleHasPermissions;

use App\Presenters\BaseGridPresenter;
use App\Transformers\RoleHasPermissionsTransformer;

class RoleHasPermissionGridPresenter extends BaseGridPresenter
{
    protected $indexColumnOptions = ['visible' => false];
    protected $actionColumnOptions = ['visible' => false];

    protected function setColumns()
    {
        return [
            'no',
            'section_name',
            [
                'key' => 'permission',
                'label' => __('permission'),
                'cell' => 'roles.permission_role'
            ]
        ];
    }

    public function present($results)
    {
        $results = with(new RoleHasPermissionsTransformer())->transformList($results->toArray());
        return $this->parsePresent($results, count($results));
    }
}
