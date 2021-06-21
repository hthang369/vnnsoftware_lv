<?php


namespace App\Services\LogAccessLaka;


use App\Repositories\LogAccessLaka\LogAccessLakaRepository;
use App\Services\Contract\ApiService;
use Illuminate\Support\Carbon;

class LogAccessLakaService extends ApiService
{
    private $logAccessLakaRepository;
    private $timeSentRequest;
    private $dateSentRequest;

    public function __construct(LogAccessLakaRepository $logAccessLakaRepository)
    {

        $this->logAccessLakaRepository = $logAccessLakaRepository;
    }

    public function sendRequestToLakaBackEnd()
    {
        $this->timeSentRequest = Carbon::now()->toTimeString();
        $this->dateSentRequest = Carbon::now()->toDateString();

        $api = '/api/v1/user/upload-access-log';
        $url = config('constants.api_address') . $api;

        $request = ['datetime' => $this->dateSentRequest];

        $method = 'POST';
        $response = $this->sendRequestToAPI($url, $method, $request);

        return $response;
    }

    public function saveLogAccessLaka($dataResponse)
    {

        $result = "";
        $message = "";
        $url_download = "";

        $dateSentRequest = $this->dateSentRequest;
        $timeSentRequest = $this->timeSentRequest;

        if ($dataResponse['error_code'] == 1) {
            $result = "error";
            $message = $dataResponse['error_msg'];
        } else {
            $result = "success";
            $message = "Sent request to Laka BackEnd success";
            $url_download = $dataResponse['data']['url'];
        }
        return $this->logAccessLakaRepository->saveLogAccessLaka($dateSentRequest, $timeSentRequest, $result, $message, $url_download);
    }

    public function getListLogAccessLaka()
    {
        return $this->logAccessLakaRepository->getListLogAccessLaka();
    }

    public function searchLog($request)
    {
        return $this->logAccessLakaRepository->searchLog($request);
    }
}
