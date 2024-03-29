<?php

namespace Modules\Admin\Repositories;

use App\Models\Users\User;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\UsersModel;
use Modules\Admin\Forms\AccountInfoForm;
use Modules\Admin\Forms\ChangePasswordForm;
use Modules\Admin\Forms\UsersForm;
use Modules\Admin\Grids\UsersGrid;
use Vnnit\Core\Permissions\Role;

class UsersRepository extends AdminBaseRepository
{
    protected $presenterClass = UsersGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return UsersForm::class;
    }

    public function accountInfoGenerate($route, $actionName, $config = [])
    {
        $modal = [
            'model' => user_get(),
            'route' => $route,
            'action' => $actionName,
            'pjaxContainer' => request()->get('ref'),
        ];

        $modal = array_merge($modal, $config);

        return [$modal, AccountInfoForm::class];
    }

    public function changePasswordGenerate($route, $actionName, $config = [])
    {
        $modal = [
            'route' => $route,
            'action' => $actionName,
            'pjaxContainer' => request()->get('ref'),
        ];

        $modal = array_merge($modal, $config);

        return [$modal, ChangePasswordForm::class];
    }

    public function update(array $attributes, $id)
    {
        $roleVals = $attributes['roles'];
        if (is_string($attributes['roles'])) {
            $roleVals = [$attributes['roles']];
        }
        $listRole = Role::whereIn('level', $roleVals)->pluck('name')->toArray();
        return DB::transaction(function () use ($attributes, $id, $listRole) {
            $user = parent::update(array_filter($attributes), $id);
            $user->syncRoles($listRole);
            return $user;
        });
    }
}
