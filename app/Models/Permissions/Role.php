<?php

namespace App\Models\Permissions;

use Modules\Core\Events\ModelDeleting;

class Role extends \Spatie\Permission\Models\Role
{
    protected $dispatchesEvents = [
        'deleting' => ModelDeleting::class,
    ];

	protected $searchable = [
        'name',
		'description'
    ];

    public function findTablesUsingModel()
    {
        return ['user_has_roles.role_id'];
    }

    public function getModelValue()
    {
        return $this->id;
    }
}
