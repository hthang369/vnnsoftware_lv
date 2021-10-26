<?php
return [

    'list_environment' => [
        'development' => [
            'api' => ['http://172.16.2.8:8000'],
            'backend' => ['http://172.16.2.8:8000'],
            'frontend' => ['http://172.16.2.8:8000'],
            'socket' => ['http://172.16.2.8:8000'],
        ],
        'staging' => [
            'api' => ['http://172.16.3.36.:8000'],
            'backend' => ['http://172.16.3.36.:8000'],
            'frontend' =>['http://172.16.3.36.:8000'],
            'socket' => ['http://172.16.3.36.:8000'],
        ],
        'production' => [
            'api' => ['http://laka.lampart-vn.com:8000'],
            'backend' => ['http://laka.lampart-vn.com:8000'],
            'frontend' => ['http://laka.lampart-vn.com:8000'],
            'socket' => ['http://laka.lampart-vn.com:8000'],
        ],
    ]
];
