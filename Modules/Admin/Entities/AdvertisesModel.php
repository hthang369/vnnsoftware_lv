<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdvertisesModel extends Model
{
    protected $table = 'advertises';

    protected $fillable = [
        'advertise_name',
        'advertise_link',
        'advertise_image',
        'advertise_type'
    ];
}
