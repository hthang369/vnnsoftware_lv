<?php

namespace App\Http\Controllers\LogActivity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LogActivity\LogActivityService;

class LogActivityController extends Controller
{
    private $logActivityService;
    private $itemsPerPage;

    public function __construct(LogActivityService $logActivityService)
    {
        parent::__construct();
        $this->logActivityService = $logActivityService;
        if (session_id() === '')
            session_start();
    }

    public function getAll(Request $request){

        $allLogs = true;

        if($request->itemsPerPage != null)
        {
            $_SESSION['itemsPerPage'] = $request->itemsPerPage;
        }

        if(isset( $_SESSION['itemsPerPage'] ))
        {
            $this->itemsPerPage = $_SESSION['itemsPerPage'];
        } else {
            $this->itemsPerPage = 5;
        }

        $logs = $this->logActivityService->getLogActivityList($this->itemsPerPage);

        $itemsPerPage = $this->itemsPerPage;

        return view("logs.list", compact('logs', 'itemsPerPage', 'allLogs'));
    }

    public function getLogActivityByUserId(Request $request, $id)
    {
        $allLogs = false;

        if($request->itemsPerPage != null)
        {
            $_SESSION['itemsPerPage'] = $request->itemsPerPage;
        }

        if(isset( $_SESSION['itemsPerPage'] ))
        {
            $this->itemsPerPage = $_SESSION['itemsPerPage'];
        } else {
            dd(3);
            $this->itemsPerPage = 5;
        }

        $itemsPerPage = $this->itemsPerPage;

        $logs = $this->logActivityService->getLogActivityByUserId($id, $this->itemsPerPage);
        return view("logs.list", compact('logs',"itemsPerPage", "allLogs"));
    }
}
