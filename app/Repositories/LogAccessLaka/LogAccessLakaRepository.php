<?php


namespace App\Repositories\LogAccessLaka;


use App\Models\LogAccessLaka;

class LogAccessLakaRepository
{

    public function saveLogAccessLaka($dateSentRequest, $timeSentRequest, $result, $message, $url_download)
    {
        LogAccessLaka::create([
            'date_sent_request' => $dateSentRequest,
            'time_sent_request' => $timeSentRequest,
            'result' => $result,
            'message' => $message,
            'url_download' => $url_download,
        ]);
    }

    public function getListLogAccessLaka()
    {
        return LogAccessLaka::latest();
    }

    public function searchLog($request)
    {
        $arrFilter = $request->all();
        $logs = LogAccessLaka::query();
        $dateTimeColumn = 'date_sent_request';
        $field_not_filter = ["page", "perPage"];

        foreach ($arrFilter as $field => $value) {
            if (!in_array($field, $field_not_filter) && $value != null) {
                if ($field == 'day') {
                    $logs = $logs->whereDay($dateTimeColumn, $value);

                } elseif ($field == 'month') {
                    $logs = $logs->whereMonth($dateTimeColumn, $value);
                } elseif ($field == 'year') {
                    $logs = $logs->whereYear($dateTimeColumn, $value);
                } else {
                    $logs = $logs->where($field, $value);
                }
            }
        }
        return $logs->latest();
    }
}
