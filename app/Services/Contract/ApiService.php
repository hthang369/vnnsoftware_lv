<?php
/**
 * Created by PhpStorm.
 * User: truong_nhat
 * Date: 12/23/2020
 * Time: 11:28 AM
 */

namespace App\Services\Contract;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;


class ApiService
{
    /**
     * @param string $string
     * @param $method
     * @param $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendRequestToAPI(string $string, $method, $request)
    {
        $client = new Client(['verify' => false]);
        $options = [
            'form_params' => $request,
            'headers' => [
                'token' => config('laka.api_token'),
                'userid' => 90,
            ],
        ];

        $response = $client->request($method, $string, $options);
        return $response;
    }


}
