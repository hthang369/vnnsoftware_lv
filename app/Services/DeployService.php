<?php

namespace App\Services;

use App\Services\Contract\ApiService;
use GuzzleHttp\Client;

class DeployService {

    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $listEnvironment;

    /**
     * DeployService constructor.
     */
    public function __construct() {
        $this->listEnvironment = config('deploy.list_environment');
    }

    public function getVersion() {
    }

    public function getVersionAPI() {
        $environments = $this->listEnvironment['api'];
        $client       = new Client();
        $return       = [];
        foreach ($environments as $environment) {
            $domain                = $environment[0];
            $url                   = $domain . '/get-version/api';
            $request               = [];
            $options               = [
                'form_params' => $request,
                'headers'     => [
                    'token'  => 'a600eec62a6b57946e3c756d636c7664',
                    'userid' => 90,
                ],
            ];
            $response              = $client->request('POST', $url, $options);
            $return [$environment] = $response->getBody()
                                              ->getContents();
        }

        return response($return);

    }
}
