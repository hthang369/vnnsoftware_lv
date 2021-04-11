<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Entities\PagesModel;

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
                'menu_name'     => 'Giới thiệu',
                'menu_link'     => 'gioi-thieu',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'page'
            ],
            [
                'menu_name' => 'Sản phẩm',
                'menu_link' => 'san-pham',
                'menu_type' => 'main',
                'children'  => [
                    [
                        'menu_name'     => 'Thiết kế web',
                        'menu_link'     => 'thiet-ke-web',
                        'menu_type'     => 'main',
                        'partial_id'    => 0,
                        'partial_table' => 'category'
                    ],
                    [
                        'menu_name'     => 'Ứng dụng',
                        'menu_link'     => 'ung-dung',
                        'menu_type'     => 'main',
                        'partial_id'    => 0,
                        'partial_table' => 'category'
                    ]
                ]
            ],
            [
                'menu_name'     => 'Tin tức',
                'menu_link'     => 'tin-tuc',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'category'
            ],
            [
                'menu_name'     => 'Liên hệ',
                'menu_link'     => 'lien-he',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'page'
            ],
        ];

        $dataFooter = [
            [
                'menu_name' => 'Trang chủ',
                'menu_link' => '',
                'menu_type' => 'main',
            ],
            [
                'menu_name'     => 'Giới thiệu',
                'menu_link'     => 'gioi-thieu',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'page'
            ],
            [
                'menu_name'     => 'Tin tức',
                'menu_link'     => 'tin-tuc',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'category'
            ],
            [
                'menu_name'     => 'Liên hệ',
                'menu_link'     => 'lien-he',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'page'
            ]
        ];

        $dataFooterOur = [
            [
                'menu_name'     => 'Thiết kế web',
                'menu_link'     => 'thiet-ke-web',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'category'
            ],
            [
                'menu_name'     => 'Ứng dụng',
                'menu_link'     => 'ung-dung',
                'menu_type'     => 'main',
                'partial_id'    => 0,
                'partial_table' => 'category'
            ]
        ];

        DB::transaction(function () use($data, $dataFooter, $dataFooterOur) {
            MenusModel::truncate();
            PagesModel::truncate();
            $this->saveData($data);
            $this->saveData($dataFooter);
            $this->saveData($dataFooterOur);
        });
    }

    function saveData($data)
    {
        $username = user_get('username') ?? 'sysadmin';
        foreach($data as $item) {
            if (!isset($item['children'])) {
                if (data_get($item, 'partial_table') == 'page') {
                    $res = PagesModel::create([
                        'post_title' => $item['menu_name'],
                        'post_author' => $username,
                        'post_link' => $item['menu_link'],
                        'post_type' => $item['partial_table'],
                        'post_status' => 1
                    ]);
                    $item['partial_id'] = $res->id;
                } else if (data_get($item, 'partial_table') == 'category') {
                    $res = CategoriesModel::where('category_link', $item['menu_link'])->first();
                    $item['partial_id'] = $res->id;
                }
            } else {
                foreach($item['children'] as $idx => $itemData) {
                    if (data_get($itemData, 'partial_table') == 'page') {
                        $res = PagesModel::create([
                            'post_title' => $itemData['menu_name'],
                            'post_author' => $username,
                            'post_link' => $itemData['menu_link'],
                            'post_type' => $itemData['partial_table'],
                            'post_status' => 1
                        ]);
                        $item['children'][$idx]['partial_id'] = $res->id;
                    } else if (data_get($itemData, 'partial_table') == 'category') {
                        $res = CategoriesModel::where('category_link', $itemData['menu_link'])->first();
                        $item['children'][$idx]['partial_id'] = $res->id;
                    }
                }
            }
            MenusModel::create($item);
        }
    }
}
