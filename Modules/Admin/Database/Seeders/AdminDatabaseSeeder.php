<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CategoriesSeederTableSeeder::class);
        $this->call(MenuSeederTableSeeder::class);
        $this->call(SettingSeederTableSeeder::class);
    }
}