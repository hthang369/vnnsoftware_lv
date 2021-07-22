<?php

use App\Models\LogRelease;
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
        factory(LogRelease::class, 20)->create();
    }
}
