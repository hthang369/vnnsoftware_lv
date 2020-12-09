<?php

namespace App\Services\ApprovalApiToken;


use Illuminate\Support\Facades\Auth;

class ApprovalApiTokenService
{
    public function __construct()
    {

    }

    public function list()
    {
//        $url = env('API_ADDRESS') . '/api/v1/api-token/get-list-approval';
//        $request = null;
//        $method = "GET";
//        $authID = Auth::id();
//        $infoRoom = $this->sendRequestToAPI($url, $method, $request, $authID);
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
//        dd(json_decode($json, true)); exit;
        return view('/approval-api-token/list')->with('json', json_decode($json, true));
        return ($infoRoom->getBody());
    }

    public function approvalToken(Request $request)
    {
    }

    public function stopToken($id, Request $request)
    {
    }

    public function deleteToken($id)
    {
    }

    private function sendRequestToAPI(string $string, $method, $request, $userID)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $options = [
            'form_params' => $request,
            'headers' => [
                'userid' => $userID,
                'secret' => md5(config('sns_config.secretToken')),
            ],
        ];

        $response = $client->request($method, $string, $options);

        return $response;
    }
}
