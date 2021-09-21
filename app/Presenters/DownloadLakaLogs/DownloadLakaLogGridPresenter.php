<?php

namespace App\Presenters\DownloadLakaLogs;

use App\Presenters\BaseGridPresenter;

class DownloadLakaLogGridPresenter extends BaseGridPresenter
{
    protected $actionColumnOptions = [
        'visible' => false,
    ];

    protected function setColumns()
    {
        return [
            'name',
            [
                'key' => 'status',
                'cell' => function ($item) {
                    if ($item->status == true) {
                        return __('laka_log.log-parsed');
                    } else {
                        return __('laka_log.log-not-parsed');
                    }
                }
            ], [
                'key' => 'action',
                'sortable' => false,
                'cell' => 'laka-log.button-parse'
            ],
        ];
    }
}
