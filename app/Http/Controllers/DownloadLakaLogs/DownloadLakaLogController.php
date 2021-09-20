<?php

namespace App\Http\Controllers\DownloadLakaLogs;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\DownloadLakaLogs\DownloadLakaLogRepository;
use App\Validators\DownloadLakaLogs\DownloadLakaLogValidator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class DownloadLakaLogController
 * @package App\Http\Controllers\DownloadLakaLogs
 * @property DownloadLakaLogRepository downloadlakalogRepository
 */
class DownloadLakaLogController extends CoreController
{
    protected $listViewName = [];

    public function __construct(DownloadLakaLogValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(DownloadLakaLogRepository::class);
    }

    public function downloadLog()  {
        // find record
        $downloadLakaLog = $this->repository->findByField('name', request('name'))[0];
        // record exist
        if($downloadLakaLog) {
            // update updated_at column
            $downloadLakaLog->updated_at = Carbon::now();
            $downloadLakaLog->save();
        }
        // record not exist
        else
        {
            // create new record
            $this->repository->create(request()->except('_token'));
        }

        // download file to project folder
        $this->repository->downloadLog(request('name'));

        return redirect()->route('laka-log.s3-log-list');

    }
}
