<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\SettingDetailModel;
use Modules\Setting\Entities\SettingModel;

class SettingSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $infoData = [
            'key' => 'info',
            'detail' => [
                'web_name' => 'Design web VNNIT',
                'web_phone' => '0976112209',
                'web_email' => 'nhanit3004@gmail.com',
                'web_address' => '9/25 Âu Dương Lân, phường 3, quận 8',
                'ob_title' => 'Design web VNNIT',
                'ob_desception' => '',
                'ob_keyword' => 'design web, thiết kế web'
            ]
        ];

        $mapData = [
            'key' => 'map',
            'detail' => [
                'web_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.820424560531!2d106.68021631457992!3d10.748319262651428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f07339b25ed%3A0xabad8cdf8ba56ef4!2zOS8yNSDDgnUgRMawxqFuZyBMw6JuLCBQaMaw4budbmcgMywgUXXhuq1uIDgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1618146043748!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
            ]
        ];

        $homeData = [
            'key' => 'home',
            'detail' => [
                'web_favicon' => '',
                'web_logo' => '',
                'web_banner' => '',
                'menu_type' => ['main', 'footer', 'footerOur', 'main_mobile']
            ]
        ];

        $widgetData = [
            'key' => 'widget',
            'detail' => [
                'text_copyright' => [
                    'title' => '',
                    'text' => '© Copyright VNNIT Computer. All Rights Reserved'
                ],
                'text_footer' => [
                    'title' => '',
                    'text' => 'Designed by VNNIT Computer'
                ],
                'text_ournews' => [
                    'title' => 'Tin tức mới của chúng tôi',
                    'text' => 'Đăng ký nhận tin mới (Đang cập nhật)'
                ],
                'text_top_herder' => [
                    'title' => '',
                    'text' => '<i class="fa fa-envelope d-flex align-items-center"><a href="mailto:nhanit3004@gmail.com">nhanit3004@gmail.com</a></i>
                    <i class="fa fa-phone d-flex align-items-center ms-4"><span>+84 976112209</span></i>'
                ],
                'text_header_social' => [
                    'title' => '',
                    'text' => '<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>'
                ],
                'text_footer_social' => [
                    'title' => '',
                    'text' => '<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-skype"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>'
                ],
            ]
        ];

        DB::transaction(function() use($infoData, $mapData, $homeData, $widgetData) {
            SettingModel::truncate();
            SettingDetailModel::truncate();

            foreach(array_merge($infoData, $mapData, $homeData, $widgetData) as $item) {
                $setting = SettingModel::create(['name' => $item['key']]);

                foreach($item['detail'] as $keyItem => $detail) {
                    $valueItem = is_string($detail) ? $detail : json_decode($detail);
                    SettingDetailModel::create([
                        'setting_id' => $setting->id,
                        'key' => $keyItem,
                        'value' => $valueItem
                    ]);
                }
            }
        });
    }
}
