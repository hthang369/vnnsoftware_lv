<?php

namespace Modules\Setting\Entities;

class SettingDetailModel extends SettingBaseModel
{
    protected $table = 'setting_details';

    protected $fillable = [
        'value'
    ];

    public function setting()
    {
        return $this->belongsTo(SettingModel::class);
    }
}
