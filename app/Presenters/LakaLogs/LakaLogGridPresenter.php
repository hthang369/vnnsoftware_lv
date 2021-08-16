<?php

namespace App\Presenters\LakaLogs;

use App\Presenters\BaseGridPresenter;

class LakaLogGridPresenter extends BaseGridPresenter
{
    protected function setColumns()
    {
        return [
            'ip',
            'url'
        ];
    }
}
