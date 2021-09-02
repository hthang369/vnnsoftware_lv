<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Modules\Admin\Entities\PostCategoriesModel;
use Modules\Admin\Entities\PostImagesModel;
use Modules\Admin\Entities\PostsModel;
use Intervention\Image\ImageManagerStatic as Image;

class GetNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vnnit-tool:get-news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // for($i = 6; $i > 1; $i--) {
            // $post_data = [];
            // $client = new Client();
            // $crawler = $client->request('GET', 'https://cellphones.com.vn/sforum/thi-truong');
            // $crawler->filter('.jeg_inner_content .jeg_posts .jeg_post')->each(function($node) use(&$post_data) {
            //     $image = head($node->filter('.jeg_thumb img')->extract(['data-src']));
            //     list($link, $title) = head($node->filter('.jeg_post_title a')->extract(['href', '_text']));
            //     $post_excerpt = $node->filter('.jeg_post_excerpt p')->text();
            //     $clientCt = new Client();
            //     $crawlerCt = $clientCt->request('GET', $link);
            //     $content = $crawlerCt->filter('.jeg_inner_content .content-inner ')->html();
            //     array_push($post_data, [
            //         'post_author' => 'sysadmin',
            //         'post_title' => $title,
            //         'post_link' => $link,
            //         'post_excerpt' => $post_excerpt,
            //         'post_date' => now(),
            //         'post_content' => $content,
            //         'post_type' => 'news',
            //         'post_status' => 1,
            //         'post_image' => $image
            //     ]);
            // });
            // collect($post_data)->reverse()->each(function($item) {
            //     $data = PostsModel::create(array_diff_key($item, ['post_image' => '']));
            //     PostImagesModel::create(['post_id' => $data->id, 'post_image' => $item['post_image']]);
            //     PostCategoriesModel::create(['post_id' => $data->id, 'category_id' => 5]);
            // });
            // $this->info("Done page 1!");
        // }
        PostImagesModel::where('post_id', '>', 16)->get()->each(function($item) {
            $fileInfo = pathinfo($item->post_image);
            Image::make($item->post_image)->save(storage_path('app/public/upload/images').'//'.$fileInfo['basename']);
            $item->post_image = $fileInfo['basename'];
            $item->save();
            // PostImagesModel::update($item->toArray());
            $this->info(sprintf("Done image %s!", $fileInfo['basename']));
        });

        $this->info('Done!');
        return 0;
    }
}
