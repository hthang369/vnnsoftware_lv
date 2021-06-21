<?php

namespace App\Http\Controllers\LogAccessLaka;

use App\Http\Controllers\Controller;
use App\Services\LogAccessLaka\LogAccessLakaService;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LogAccessLakaController extends Controller
{
    //
    private $logAccessLakaService;
    private $listMonth;
    private $listDay;
    private $listYear;

    public function __construct(LogAccessLakaService $logAccessLakaService)
    {
        parent::__construct();
        $this->logAccessLakaService = $logAccessLakaService;
        $this->generateListDateTime();

    }

    public function getListLogAccessLaka(Request $request)
    {
        $perPage = $request->perPage;
        if ($perPage == null) {
            $perPage = 5;
        }
        $currentRoute = $request->route()->getName();

        $list = $this->logAccessLakaService->getListLogAccessLaka()->paginate($perPage);

        return view('log-access-laka.list')->with([
            'list' => $list,
            'listMonth' => $this->listMonth,
            'listDay' => $this->listDay,
            'listYear' => $this->listYear,
            'currentRoute' => $currentRoute,
            'perPage' => $perPage
        ]);
    }

    public function searchLog(Request $request)
    {
        $perPage = $request->perPage;
        if ($perPage == null) {
            $perPage = 5;
        }

        $logs = $this->logAccessLakaService->searchLog($request)->paginate($perPage);

        $oldRequest = $request->all();
        $currentRoute = $request->route()->getName();

        return view('log-access-laka.list')->with([
            'list' => $logs,
            'listMonth' => $this->listMonth,
            'listDay' => $this->listDay,
            'listYear' => $this->listYear,
            'oldRequest' => $oldRequest,
            'currentRoute' => $currentRoute,
            'perPage' => $perPage
        ]);
    }

    public function generateListDateTime()
    {
        $month = [];
        $year = [];
        $date = [];
        for ($m = 1; $m <= 12; $m++) {
            $month[] = $m . ' - ' . date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        }
        for ($y = 2015; $y <= Carbon::now()->year; $y++) {
            $year[] = $y;
        }
        for ($day = 1; $day <= 31; $day++) {
            $date[] = $day;
        }
        $this->listMonth = $month;
        $this->listDay = $date;
        $this->listYear = $year;

    }
}
