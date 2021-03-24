<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'employee_no',
        'first_name',
        'last_name',
        'avatar',
        'birthday',
        'gender',
        'phone_number',
        'email_address'
    ];
}
