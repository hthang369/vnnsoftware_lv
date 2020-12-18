<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeftMenu extends Model
{
    use SoftDeletes;

    protected $table = 'left_menu';

    protected $fillable = [
        'name', 'top_menu_id', 'index', 'url', 'lang',
    ];

    protected $softDelete = true;

    public function top_menu()
    {
        return $this->belongsTo('App\Models\TopMenu')->first();
    }
}
