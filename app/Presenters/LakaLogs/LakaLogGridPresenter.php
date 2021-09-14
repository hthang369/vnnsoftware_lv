<?php

namespace App\Presenters\LakaLogs;

use App\Presenters\BaseGridPresenter;

class LakaLogGridPresenter extends BaseGridPresenter
{
    protected $exceptQuery = ['date_log'];

    protected function setColumns()
    {
        return [
            'log_level',
            'ip',
            'date_log',
            'url'
        ];
    }
}
