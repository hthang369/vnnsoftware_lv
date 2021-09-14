<?php

namespace App\Http\Controllers\DownloadLakaLogs;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\DownloadLakaLogs\DownloadLakaLogRepository;
use App\Validators\DownloadLakaLogs\DownloadLakaLogValidator;
use Illuminate\Support\Carbon;

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

        $downloadLakaLog = $this->repository->findByField('name', request('name'))->toArray()[0];

        if($downloadLakaLog) {
            $downloadLakaLog->updated_at = Carbon::now();
            $downloadLakaLog->save();
        }
        else $this->repository->create(request()->except('_token'));

        return $this->repository->downloadLog(request('name'));
    }
}
