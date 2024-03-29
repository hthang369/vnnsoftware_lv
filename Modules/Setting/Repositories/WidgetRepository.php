<?php

namespace Modules\Setting\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\SettingDetailModel;
use Modules\Setting\Entities\SettingModel;

class WidgetRepository extends SettingBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SettingDetailModel::class;
    }

    public function getWidgetList()
    {
        $table = resolve(SettingModel::class)->getTable();
        $detail = $this->model->getTable();
        return $this->model::join($table, "$detail.setting_id", '=', "$table.id")
            ->select(["$detail.*"])
            ->where("$table.name", 'widget')
            ->get()
            ->groupBy(function ($item) {
                return str_before($item->key, '_');
            });
    }

    public static function getWidget($name)
    {
        $allSetting = static::getSetting($name);
        return $allSetting->mapToGroups(function ($item, $key) {
            return [str_before($key, '_') => [str_after($key, '_') => $item]];
        })->map(function ($item) {
            return $item->collapse();
        });
    }

    public function create($attributes)
    {
        DB::transaction(function () use ($attributes) {
            $result = resolve(SettingModel::class)->findOrCreate('widget_config');
            $columns = array_collapse(array_map(function ($item) use ($attributes) {
                return [$item => $attributes[$item]];
            }, $attributes['devices']));
            try {
                $this->model->updateOrCreate([
                    'setting_id' => $result->id,
                    'key' => 'widget_' . $attributes['key']
                ], [
                    'value' => json_encode([
                        'name' => $attributes['name'],
                        'columns' => $columns
                    ])
                ]);
            } catch (\Exception $e) {
            }
        });
    }

    public function update($attributes, $id)
    {
        $attrData = array_except($attributes, ['widget_group', '_token']);
        $widget_group = data_get($attributes, 'widget_group');
        $data = collect();
        DB::transaction(function () use ($attrData, $id, $widget_group, &$data) {
            $group = json_decode(static::getDetail('widget', $widget_group), true);
            $group = array_map(function ($item) use ($id) {
                return starts_with($item, 'slot') ? $id : $item;
            }, $group);
            $data->push(parent::update([
                $id => json_encode($attrData)
            ], 'widget'));
            $data->push(parent::update([
                $widget_group => json_encode($group)
            ], 'widget'));
        });
        return $data;
    }
}
