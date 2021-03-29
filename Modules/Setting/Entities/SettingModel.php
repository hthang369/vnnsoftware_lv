<?php

namespace Modules\Setting\Entities;

class SettingModel extends SettingBaseModel
{
    protected $table = 'settings';

    protected $fillable = [
        'name'
    ];

    public function settingDetail()
    {
        return $this->hasMany(SettingDetailModel::class, 'setting_id');
    }
}
