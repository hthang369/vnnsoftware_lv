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
        $sections = config('menu');

        DB::transaction(function () use($sections) {
            foreach($sections as $index => $section) {
                $data = [
                    'index'             => ($index + 1),
                    'route_name'        => "{$section['code']}.{$section['name']}",
                    'url'               => route("{$section['code']}.{$section['name']}", [], false),
                    'lang'              => __('menu.'.str_replace('-', '_', $section['code'])),
                    'description'       => __('menu.description.'.str_replace('-', '_', $section['code'])),
                    'is_no_left_menu'   => 0
                ];
                $result = TopMenu::firstOrCreate(['group' => $section['code']], $data);
                foreach($section['children'] as $idx => $item) {
                    $dataItem = [
                        'top_menu_id'       => $result->id,
                        'index'             => ($idx + 1),
                        'route_name'        => "{$section['code']}.{$item}",
                        'url'               => route("{$section['code']}.{$item}", [], false),
                        'lang'              => __('menu.'.str_replace('-', '_', $section['code']).'_'.str_replace('-', '_', $item))
                    ];
                    LeftMenu::firstOrCreate([
                        'top_menu_id'   => $result->id,
                        'group'         => $section['code']
                    ], $dataItem);
                }
            }
        });
    }
}
