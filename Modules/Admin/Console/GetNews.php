<?php

namespace Modules\Admin\Console;

use Illuminate\Console\Command;
use Goutte\Client;
use Modules\Admin\Entities\PostCategoriesModel;
use Modules\Admin\Entities\PostImagesModel;
use Modules\Admin\Entities\PostsModel;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Admin\Entities\CrawlerNewsModel;
use Modules\Admin\Services\CellphonesCrawler;

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
        $results = CrawlerNewsModel::where('status', 1)->get();
        $results->each(function($item, $idx) {
            $crawler = new CellphonesCrawler($item);
            $crawler->crawlerHandle();
        });

        $this->info('Done!');
        return 0;
    }
}
