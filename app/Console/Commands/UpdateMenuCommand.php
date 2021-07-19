<?php

namespace App\Console\Commands;

use App\Models\Menus\LeftMenu;
use App\Models\Menus\TopMenu;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateMenuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laka-tool:update-menu';

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
        DB::transaction(function () {
            TopMenu::whereNotNull('deleted_at')->delete();
            LeftMenu::whereNotNull('deleted_at')->delete();

            $dataTop = TopMenu::all();
            foreach($dataTop as $item) {
                $item['route_name'] = $item['group'].'.index';
                $item['url'] = route($item['route_name']);
                TopMenu::update($item);
            }

            $dataLeft = LeftMenu::all();
            foreach($dataLeft as $item) {
                $item['route_name'] = $item['group'].'.index';
                $item['url'] = route($item['route_name']);
                LeftMenu::update($item);
            }
        });
        $this->info('Done!');
        return 0;
    }
}
