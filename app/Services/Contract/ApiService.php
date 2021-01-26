<?php
/**
 * Created by PhpStorm.
 * User: truong_nhat
 * Date: 12/23/2020
 * Time: 11:28 AM
 */

namespace App\Services\Contract;


class ApiService
{
    /**
     * @param string $string
     * @param $method
     * @param $request
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequestToAPI(string $string, $method, $request)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $options = [
            'form_params' => $request,
            'headers' => [
                'token' => 'test-token',
            ],
        ];

        $response = $client->request($method, $string, $options);
        return $response;
    }
}
