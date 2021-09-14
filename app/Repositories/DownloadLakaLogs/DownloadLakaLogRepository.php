<?php

namespace App\Repositories\DownloadLakaLogs;

use App\Repositories\Core\CoreRepository;
use App\Models\DownloadLakaLogs\DownloadLakaLog;
use App\Presenters\DownloadLakaLogs\DownloadLakaLogGridPresenter;
use Illuminate\Support\Facades\Storage;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class DownloadLakaLogRepository extends CoreRepository
{
    protected $modelClass = DownloadLakaLog::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $storage;

    public function __construct()
    {
        parent::__construct();

        $this->storage = Storage::disk('s3');
    }

    protected $presenterClass = DownloadLakaLogGridPresenter::class;

    public function downloadLog($name) {
        return $this->storage->download($name);
    }
}
