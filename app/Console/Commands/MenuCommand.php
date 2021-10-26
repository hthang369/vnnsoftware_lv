<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Menus\LeftMenu;
use App\Models\Menus\TopMenu;
use Illuminate\Support\Facades\Artisan;

class MenuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laka-tool:menu-fresh {--init}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh menu';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Refresh menu ...');
        if ($this->option('init')) {
            $this->info('Reset menu ...');
            TopMenu::truncate();
            LeftMenu::truncate();
            $this->info('Reset menu: Done!');
        }

        Artisan::call('db:seed', ['--class' => 'MenuSeeder']);
        $this->info('Refresh menu: Done!');
    }
}
