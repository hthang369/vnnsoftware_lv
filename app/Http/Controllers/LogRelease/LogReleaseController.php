<?php

namespace App\Http\Controllers\LogRelease;

use App\Http\Controllers\Controller;
use App\Models\LogRelease;
use App\Services\LogRelease\LogReleaseService;
use Illuminate\Http\Request;

class LogReleaseController extends Controller
{

    private $logReleaseService;
    public function __construct(LogReleaseService $logReleaseService)
    {
        parent::__construct();
        $this->logReleaseService = $logReleaseService;
    }

    public function getLogReleaseList(){

        $logReleaseList = $this->logReleaseService->getLogReleaseList();
        return view('logs-release.list',compact('logReleaseList'));
    }
    public function getLogReleaseByUserId($user_id){
        $logReleaseList = $this->logReleaseService->getLogReleaseByUserId($user_id);
        return view('logs-release.list',compact('logReleaseList'));
    }
   public function searchLogRelease(Request $request){

        $logReleaseList = $this->logReleaseService->searchLogRelease($request);
        return $logReleaseList;
//        return view('logs-release.list',compact('logReleaseList'));
   }
}
