<?php

namespace App\Repositories\LakaLogs;

use App\Models\LakaLogs\AwsS3Log;
use App\Presenters\LakaLogs\AwsS3LogGridPresenter;
use App\Repositories\Core\CoreRepository;
use App\Services\LakaLogs\LakaLogService;
use Illuminate\Support\Facades\Storage;
use Laka\Core\Traits\BuildPaginator;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class AwsS3LogRepository extends CoreRepository
{
    use BuildPaginator;

    protected $modelClass = AwsS3Log::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $presenterClass = AwsS3LogGridPresenter::class;
    protected $storage;
    protected $lakaLogService;

    public function __construct()
    {
        parent::__construct();
        $this->storage = Storage::disk('s3');
        $this->lakaLogService = new LakaLogService();
    }

    public function getLogFromS3()
    {
        $pattern = '/laravel-[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9].log/';
        $files = $this->storage->allFiles(DIRECTORY_SEPARATOR);

        return array_filter($files, function ($file) use ($pattern) {
            return str_contains($file, 'laravel-') || str_contains($file, 'laka-');
        });
    }

    public function filesPaginate($files, $page)
    {
        $downloadLakaLogRepository = resolve(DownloadLakaLogRepository::class);
        $onPage = $this->getLimitForPagination();
        $results = $this->paginator($files->forPage($page, $onPage)->all(), $files->count(), $onPage, $page, []);
        // check if user has already downloaded file
        foreach ($results as $key => $value) {
            $downloadLakaLog = $downloadLakaLogRepository->findByField('name', $value)->toArray()[0];

            $results[$key] = [
                'name' => $value,
                'isDownloaded' => $downloadLakaLog != null,
            ];
        }

        return $this->parserResult($results);
    }
}
