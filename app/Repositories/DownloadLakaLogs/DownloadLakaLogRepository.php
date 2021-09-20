<?php

namespace App\Repositories\DownloadLakaLogs;

use App\Repositories\Core\CoreRepository;
use App\Models\DownloadLakaLogs\DownloadLakaLog;
use App\Presenters\DownloadLakaLogs\DownloadLakaLogGridPresenter;
use Aws\S3\S3Client;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

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

    public function downloadLog($name) : bool {
        return Storage::disk('local')->put(
            'public/files/' . $name,
            file_get_contents($this->storage->get($name))
        );
    }
}
