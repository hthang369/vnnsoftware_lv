<?php

namespace App\Models\Menus;

use Laka\Core\Entities\BaseModel;

class TopMenu extends BaseModel
{
    protected $table = 'top_menu';

    protected $fillable = [
        'group',
        'index',
        'url',
        'lang',
        'description',
        'is_no_left_menu'
    ];
}
