<?php

namespace App\Presenters\LakaLogs;

use App\Presenters\BaseGridPresenter;

class AwsS3LogGridPresenter extends BaseGridPresenter
{
    protected $actionColumnOptions = [
        'visible' => false,
    ];

    protected function setColumns()
    {
        return [
            'name',
            [
                'key' => 'isDownloaded',
                'label' => __('table.action'),
                'sortable' => false,
                'cell' => 'laka-log.button-download'
            ]
        ];
    }
}
