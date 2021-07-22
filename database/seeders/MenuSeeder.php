<?php

namespace Database\Seeders;

use App\Models\Menus\LeftMenu;
use App\Models\Menus\TopMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'code' => 'user-management',
                'name' => 'index',
                'children' => ['index', 'create']
            ],
            [
                'code' => 'bussiness-plan',
                'name' => 'index',
                'children' => ['index', 'create']
            ],
            [
                'code' => 'company',
                'name' => 'index',
                'children' => ['index', 'create']
            ],
            [
                'code' => 'role-management',
                'name' => 'index',
                'children' => ['index', 'create']
            ],
            [
                'code' => 'laka-user-management',
                'name' => 'index',
                'children' => ['index', 'user-disable', 'create', 'add-contact']
            ],
            [
                'code' => 'version',
                'name' => 'index',
                'children' => ['index']
            ],
            [
                'code' => 'version-deploy',
                'name' => 'development',
                'children' => ['development', 'staging', 'production', 'log-release']
            ]
        ];

        DB::transaction(function () use($sections) {
            foreach($sections as $index => $section) {
                $data = [
                    'group'             => $section['code'],
                    'index'             => ($index + 1),
                    'route_name'        => "{$section['code']}.{$section['name']}",
                    'url'               => route("{$section['code']}.{$section['name']}", [], false),
                    'lang'              => __('menu.'.str_replace('-', '_', $section['code'])),
                    'description'       => __('menu.description.'.str_replace('-', '_', $section['code'])),
                    'is_no_left_menu'   => 0
                ];
                $result = TopMenu::create($data);
                foreach($section['children'] as $idx => $item) {
                    $dataItem = [
                        'top_menu_id'       => $result->id,
                        'group'             => $section['code'],
                        'index'             => ($idx + 1),
                        'route_name'        => "{$section['code']}.{$item}",
                        'url'               => route("{$section['code']}.{$item}", [], false),
                        'lang'              => __('menu.'.str_replace('-', '_', $section['code']).'_'.str_replace('-', '_', $item))
                    ];
                    LeftMenu::create($dataItem);
                }
            }
        });
    }
}
