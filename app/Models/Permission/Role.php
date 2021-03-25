<?php

namespace App\Models\Permission;

use Modules\Core\Contracts\CanCheckInUse;
use Modules\Core\Entities\Concerns\HasTimezone;
use Modules\Core\Events\ModelDeleting;
use Modules\Core\Models\Concerns\CheckInUse;
use Modules\Core\Traits\FullTextSearch;

class Role extends \Spatie\Permission\Models\Role implements CanCheckInUse
{
    use HasTimezone, CheckInUse, FullTextSearch;

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
