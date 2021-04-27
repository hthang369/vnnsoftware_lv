<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;use Carbon\Carbon;
use App\Models\LogActivity;

class LogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:logactivity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log activity';

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
     * @return mixed
     */
    public function handle()
    {
        LogActivity::where('created_at', '<=',  Carbon::now()->subMinutes(2)->toDateTimeString())->get()->each->delete();
    }
}
