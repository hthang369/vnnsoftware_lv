<?php

namespace Modules\Admin\Repositories;

use App\Models\Permission\Permission;
use App\Models\Permission\RoleHasPermissions;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Grids\PermissionRoleGrid;

class PermissionRoleRepository extends AdminBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoleHasPermissions::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return PermissionRoleGrid::class;
    }

    protected function getGridParams()
    {
        $params = parent::getGridParams();
        return array_merge($params, ['paginationSize' => 100]);
    }

    public function update(array $attributes, $id)
    {
        $attributes = array_diff_key($attributes, array_flip(['_method', '_token', 'q']));
        if (count($attributes) == 0) return;
        $result = Permission::whereIn('name', array_keys($attributes))->pluck('id')->sort();
        return DB::transaction(function () use($id, $result) {
            $this->model->where('role_id', $id)->delete();
            $data = $result->map(function($value) use($id) {
                return [
                    'permission_id' => $value,
                    'role_id' => $id
                ];
            })->toArray();
            return RoleHasPermissions::insert($data);
        });
    }
}
