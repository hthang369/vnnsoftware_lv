<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->where('name', '=', 'Role For Set Permission')->delete();
        DB::table('role')->insert([
            'name' => 'Role For Set Permission',
            'role_rank' => 1,
            'description' => 'Role for set permission',
            'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
