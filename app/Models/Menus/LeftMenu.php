<?php

namespace App\Models\Menus;

use App\Core\Entities\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeftMenu extends BaseModel
{
    use SoftDeletes;

    protected $table = 'left_menu';

    protected $softDelete = true;

    public function top_menu()
    {
        return $this->belongsTo('App\Models\TopMenu')->first();
    }
}
