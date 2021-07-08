<?php

namespace App\Models\Menus;

use App\Core\Entities\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopMenu extends BaseModel
{
    use SoftDeletes;

    protected $table = 'top_menu';

    protected $softDelete = true;

    protected $fillable = [
        'group',
        'index',
        'url',
        'lang',
        'description',
        'is_no_left_menu'
    ];
}
