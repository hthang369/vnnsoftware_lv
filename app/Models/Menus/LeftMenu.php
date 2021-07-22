<?php

namespace App\Models\Menus;

use App\Core\Entities\BaseModel;

class LeftMenu extends BaseModel
{
    protected $table = 'left_menu';

    public function top_menu()
    {
        return $this->belongsTo('App\Models\TopMenu')->first();
    }
}
