<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListFunctionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ListFunction::truncate();
        $listFunction = [
            'LMT user manage' => [
                'LMT user list',
                'Search LMT user',
                'Add LMT user',
                'LMT user info (detail)',
                'Role assign',
                'LMT user delete',
            ],
            'LMT role manage' => [
                'Role list',
                'Role search',
                'Add role',
                'Role setting',
                'Role delete',
            ],
            'LAKA user manage' => [
                'LAKA User list',
                'Search LAKA user',
                'Create LAKA user',
                'Update LAKA user info',
                'Approve access token',
                'Pending access token',
                'Delete LAKA user',
                'Add LAKA user to company',
            ],
            'LAKA company manage' => [
                'Company list',
                'Search company',
                'Add company',
                'Update company info',
                'Delete company',
            ],
            'LAKA business plan' => [
                'Business plan list',
                'Search business plan',
                'Add business plan',
                'Update business plan info',
                'Delete business plan',
            ],
        ];

        $listFunctionIsMain = [
            'LMT user manage' => [
                'LMT user list',
                'Role assign',
            ],
            'LMT role manage' => [
                'Role list',
                'Role setting',
            ],
        ];

        foreach ($listFunction as $group => $functions) {
            foreach ($functions as $function) {
                DB::table('list_function')->insert([
                    'group' => $group,
                    'function' => $function,
                    'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }

        foreach ($listFunctionIsMain as $group => $functions) {
            foreach ($functions as $function) {
                DB::table('list_function')
                    ->where('function', '=', $function)
                    ->update(['is_main' => 1]);
            }
        }
    }

}
