<?php

namespace App\Repositories\LakaLogs;

use App\Helpers\HttpLogParser;
use App\Helpers\LogParser;
use App\Repositories\Core\CoreRepository;
use App\Models\LakaLogs\LakaLog;
use App\Presenters\LakaLogs\LakaLogGridPresenter;
use App\Repositories\Filters\WhereBetweenClause;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;
use Illuminate\Pagination\LengthAwarePaginator;

class LakaLogRepository extends CoreRepository
{
    protected $modelClass = LakaLog::class;

    protected $filters = [
        'name' => WhereClause::class,
        'date_log' => WhereBetweenClause::class
    ];

    protected $presenterClass = LakaLogGridPresenter::class;
    protected $storage;

    public function __construct()
    {
        parent::__construct();

        $this->storage = Storage::disk('s3');
    }

    public function formGenerate()
    {
        $pattern = '/laravel-[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9].log/';
        $files = $this->storage->allFiles(DIRECTORY_SEPARATOR);

        return ['files' => array_filter($files, function($file) use($pattern) {
            return str_contains($file, 'laravel-') || str_contains($file, 'laka-');
        })];
    }

    public function filesPaginate($files, $page): LengthAwarePaginator
    {
        $onPage = config('constants.pagination.items_per_page');
        $slice = $files->slice(($page-1)* $onPage, $onPage);
        return new LengthAwarePaginator(
            $slice,
            $files->count(),
            $onPage,
            $page,
            ['path' => route('laka-log.s3-log-list')],
        );
    }

    public function create(array $attributes)
    {
        $files = $attributes['files'];
        $dataFiles = $this->storage->allFiles(DIRECTORY_SEPARATOR);
        $dataLog = [];
        foreach ($dataFiles as $file) {
            if (in_array($file, $files)) {
                $data = [];
                if (starts_with($file, 'laravel')) {
                    $data = LogParser::parse($this->storage->get($file));
                    $data = array_map(function($item) {
                        $item['date_log'] = LogParser::extractDateTime($item['header']);
                        return [
                            'ip' => request()->ip(),
                            'url' => '',
                            'date_log' => $item['date_log'],
                            'message' => $item['header'],
                            'log_level' => $item['level'],
                            'log_type' => 'laravel',
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }, $data);
                } else {
                    $result = explode('<br />', nl2br($this->storage->get(DIRECTORY_SEPARATOR.$file)));
                    // $result = file(storage_path('logs'.DIRECTORY_SEPARATOR.$file), FILE_IGNORE_NEW_LINES);
                    foreach($result as $line) {
                        $envroment = starts_with($file, 'real') ? 'real' : 'stg';
                        $item = array_merge(HttpLogParser::parse(trim($line)), [
                            'log_level' => 'laka_'.$envroment,
                            'log_type' => 'apache',
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                        array_push($data, $item);
                    }
                }
                $dataLog = array_merge($dataLog, $data);
            }
        }

        return $this->model::insert($dataLog);
    }
}
