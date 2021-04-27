<?php

namespace App\Http\Controllers\LogActivity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LogActivity\LogActivityService;

class LogActivityController extends Controller
{
    private $logActivityService;
    
    public function __construct(LogActivityService $logActivityService)
    {
        $this->logActivityService = $logActivityService;
    }

    public function getAll(){
        $logs = $this->logActivityService->getLogActivityList();
        return view("logs.list", compact('logs'));
    }

    public function getLogActivityByUserId($id)
    {
        $logs = $this->logActivityService->getLogActivityByUserId($id);
        return view("logs.list", compact('logs'));
    }
}
