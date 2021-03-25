<?php

namespace App\Models\PermissionSection;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'name',
        'code',
        'url',
        'api',
        'description'
    ];
}
