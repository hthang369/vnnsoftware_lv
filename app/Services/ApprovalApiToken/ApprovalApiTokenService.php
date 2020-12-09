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
        $url = env('API_ADDRESS') . '/api/v1/api-token/get-list-approval';
        $request = null;
        $method = "GET";
        $authID = Auth::id();
        $infoRoom = $this->sendRequestToAPI($url, $method, $request, $authID);
        return view('/system-admin/approval-api-token/list')->with('json', $infoRoom->getBody());
    }

    public function approvalToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/approve-token';
        $request  = ['id' => $id];
        $method   = "POST";
        $authID   = Auth::id();
        $infoRoom = $this->sendRequestToAPI($url, $method, $request, $authID);
        return redirect()->intended('/system-admin/approval-api-token/list')->with('saved', true);
    }

    public function stopToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/stop-token';
        $request  = ['id' => $id];
        $method   = "POST";
        $authID   = Auth::id();
        $infoRoom = $this->sendRequestToAPI($url, $method, $request, $authID);
        return redirect()->intended('/system-admin/approval-api-token/list')->with('saved', true);
    }

    public function deleteToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/delete-token';
        $request  = ['id' => $id];
        $method   = "POST";
        $authID   = Auth::id();
        $infoRoom = $this->sendRequestToAPI($url, $method, $request, $authID);
        return redirect()->intended('/system-admin/approval-api-token/list')->with('saved', true);
    }

    private function sendRequestToAPI(string $string, $method, $request, $userID)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $options = [
            'form_params' => $request,
            'headers' => [
//                'userid' => $userID,
                'token' => 'test-token',
//                'secret' => md5(config('sns_config.secretToken')),
            ],
        ];

        $response = $client->request($method, $string, $options);

        return $response;
    }
}
