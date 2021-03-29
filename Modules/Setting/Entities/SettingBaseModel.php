<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Core\Entities\BaseModel;

abstract class SettingBaseModel extends BaseModel
{
    protected static $settingName;

    public static function getSettingId()
    {
        $id = SettingModel::where('name', static::$settingName)->value('id');

        if (!$id) {
            throw new ModelNotFoundException('Cannot get id of ' . static::$settingName . ' setting');
        }

        return $id;
    }

    public static function getSettingName()
    {
        return static::$settingName;
    }

    public static function generateSettingId()
    {
        $id = SettingModel::where('name', static::$settingName)->value('id');
        if (!$id) {
            $data = SettingModel::create(['name' => static::$settingName]);
            $id = $data->id;
        }
        return $id;
    }
}
