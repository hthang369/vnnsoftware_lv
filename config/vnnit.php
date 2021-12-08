<?php

return [
    'wather' => [
        'api_address'   => 'http://dataservice.accuweather.com',
        'icon_address'  => 'https://www.accuweather.com/images/weathericons',
        'api_reference' => [
            'locations'     => 'locations/v1',
            'forecasts'     => 'forecasts/v1'
        ],
        'api_options'   => [
            'forecasts'  => [
                'daily'     => [
                    '1'     => '1day',
                    '5'     => '5day',
                    '10'    => '10day',
                    '15'    => '15day'
                ],
                'hourly' => [
                    '1'     => '1hour',
                    '12'    => '12hour',
                    '24'    => '24hour',
                    '72'    => '72hour',
                    '120'   => '120hour'
                ]
            ]
        ],
        'list_location' => [
            'TPHCM'  => 353981,
            'HANOI'  => 353412,
            'DANANG' => 352954
        ],
        'api_key'      => 'POSRxltsTf2PmObOe1J8GlwwcmrG3ayj'
    ]
];
