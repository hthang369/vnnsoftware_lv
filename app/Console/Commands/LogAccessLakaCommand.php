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
    protected $signature = 'log:logaccesslaka';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log Access Laka Command';

    private $logAccessLakaService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(LogAccessLakaService $logAccessLakaService)
    {

        parent::__construct();
        $this->logAccessLakaService = $logAccessLakaService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->sendRequest();
        $dataResponse = json_decode($response->getBody()->getContents(), true);

        $this->saveLogAccessLaka($dataResponse);
    }

    public function sendRequest()
    {
        return $this->logAccessLakaService->sendRequestToLakaBackEnd();
    }

    public function saveLogAccessLaka($dataResponse)
    {
        return $this->logAccessLakaService->saveLogAccessLaka($dataResponse);
    }
}
