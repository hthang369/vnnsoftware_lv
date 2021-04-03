<?php

namespace Modules\Admin\Entities;

class AdvertisesModel extends AdminBaseModel
{
    protected $table = 'advertises';

    protected $fillable = [
        'advertise_name',
        'advertise_link',
        'advertise_image',
        'advertise_type',
        'sequence'
    ];
}
