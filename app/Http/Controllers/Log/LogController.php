<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use App\Services\LogAccessLaka\LogAccessLakaService;

class LogController extends Controller
{

    public function index()
    {
        $logAccessLaka = new LogAccessLakaService();
        $logAccessLaka->sendRequestToLakaBackEnd();
        return view('/common/index_page_top_menu');
    }
}
