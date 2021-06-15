<?php


namespace App\Services\LogAccessLaka;


use App\Repositories\LogAccessLaka\LogAccessLakaRepository;
use App\Services\Contract\ApiService;
use Illuminate\Support\Carbon;

class LogAccessLakaService extends ApiService
{
    private $logAccessLakaRepository;

    public function __construct(LogAccessLakaRepository $logAccessLakaRepository)
    {
        $this->logAccessLakaRepository = $logAccessLakaRepository;
    }

    public function sendRequestToLakaBackEnd()
    {
        $api = '/api/v1/user/upload-access-log';
        $url = config('constants.api_address') . $api;

        $timeSendRequest = Carbon::now()->toDateString();
        $request = ['datetime' => $timeSendRequest];

        $method = 'POST';
        $response = $this->sendRequestToAPI($url, $method, $request);

        $dataResponse = json_decode($response->getBody()->getContents(), true);

        return $dataResponse;
    }

    public function saveLogAccessLaka($dataResponse)
    {
        $this->logAccessLakaRepository->saveLogAccessLaka($dataResponse);
    }
}
