<?php

use Illuminate\Database\Seeder;

class LogReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Models\LogRelease::class, 20)->create();
    }
}
