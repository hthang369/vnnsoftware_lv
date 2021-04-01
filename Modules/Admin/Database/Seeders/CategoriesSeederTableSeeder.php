<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\CategoriesModel;

class CategoriesSeederTableSeeder extends Seeder
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
                'category_name' => 'Thiết kế web',
                'category_link' => 'thiet-ke-web',
                'category_status' => 1,
                'children'  => [
                    [
                        'category_name' => 'Web bán hàng',
                        'category_link' => 'web-ban-hang',
                        'category_status' => 1,
                    ],
                    [
                        'category_name' => 'Web tin tức',
                        'category_link' => 'web-tin-tuc',
                        'category_status' => 1,
                    ]
                ]
            ],
            [
                'category_name' => 'Ứng dụng',
                'category_link' => 'ung-dung',
                'category_status' => 1,
            ]
        ];

        DB::transaction(function () use($data) {
            CategoriesModel::truncate();
            foreach($data as $item) {
                CategoriesModel::create($item);
            }
        });
    }
}
