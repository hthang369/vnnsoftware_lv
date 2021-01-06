<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopMenu extends Model
{
    use SoftDeletes;

    protected $table = 'top_menu';

    protected $softDelete = true;
}
