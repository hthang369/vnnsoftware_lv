<?php

namespace App\Presenters\LogReleases;

use App\Presenters\BaseGridPresenter;

class LogReleaseGridPresenter extends BaseGridPresenter
{
    protected $actionColumnOptions = [
        'visible' => false
    ];

    protected function setColumns()
    {
        return [
            'user_id',
            'user_name',
            'deploy_server_id',
            'redmine_id',
            'version',
            'release_type',
            'environment'
        ];
    }
}
