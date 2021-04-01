<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\MenusModel;

class MenuSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'menu_name' => 'Trang chủ',
                'menu_link' => '',
                'menu_type' => 'main',
            ],
            [
                'menu_name' => 'Giới thiệu',
                'menu_link' => 'gioi-thieu',
                'menu_type' => 'main',
            ],
            [
                'menu_name' => 'Sản phẩm',
                'menu_link' => 'san-pham',
                'menu_type' => 'main',
                'children'  => [
                    [
                        'menu_name' => 'Thiết kế web',
                        'menu_link' => 'thiet-ke-web',
                        'menu_type' => 'main',
                    ],
                    [
                        'menu_name' => 'Ứng dụng',
                        'menu_link' => 'ung-dung',
                        'menu_type' => 'main',
                    ]
                ]
            ],
            [
                'menu_name' => 'Tin tức',
                'menu_link' => 'tin-tuc',
                'menu_type' => 'main',
            ],
            [
                'menu_name' => 'Liên hệ',
                'menu_link' => 'lien-he',
                'menu_type' => 'main',
            ],
        ];

        DB::transaction(function () use($data) {
            MenusModel::truncate();
            foreach($data as $item) {
                MenusModel::create($item);
            }
        });
    }
}
