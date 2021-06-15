<?php

namespace App\Console\Commands;

use App\Services\LogAccessLaka\LogAccessLakaService;
use Illuminate\Console\Command;

class LogAccessLakaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $logAccessLakaService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(LogAccessLakaService $logAccessLakaService)
    {
        $this->logAccessLakaService = $logAccessLakaService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->sendRequest();
        $dataResponse = json_decode($response,true);
        $dataResponse = $this->logAccessLakaService->sendRequestToLakaBackEnd();
        $this->logAccessLakaService->saveLogAccessLaka($dataResponse);
    }
    public function sendRequest(){
        return $this->logAccessLakaService->sendRequestToLakaBackEnd();
    }

}
