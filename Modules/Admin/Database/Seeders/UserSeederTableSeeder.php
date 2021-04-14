<?php

namespace Modules\Admin\Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\EmployeeModel;

class UserSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = [
            'username'  => 'sysadmin',
            'name'      => 'Sys Admin',
            'email'     => 'thangtran3690@gmail.com',
            'password'  => 'thang789'
        ];

        DB::transaction(function () use($data) {
            User::truncate();
            EmployeeModel::truncate();

            $employeeInfo = EmployeeModel::create([
                'employee_no' => $data['username'],
                'last_name' => $data['name'],
                'gender' => 0,
                'email_address' => $data['email'],
            ]);

            return User::create([
                'username' => $data['username'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'employee_id' => $employeeInfo->id
            ]);
        });
    }
}
