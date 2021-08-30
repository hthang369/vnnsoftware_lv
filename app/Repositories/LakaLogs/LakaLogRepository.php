<?php

namespace App\Repositories\LakaLogs;

use App\Helpers\HttpLogParser;
use App\Helpers\LogParser;
use App\Repositories\Core\CoreRepository;
use App\Models\LakaLogs\LakaLog;
use App\Presenters\LakaLogs\LakaLogGridPresenter;
use App\Repositories\Filters\WhereBetweenClause;
use Illuminate\Support\Facades\Storage;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

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

        $this->storage = Storage::disk('logs');
    }

    public function formGenerate()
    {
        $pattern = '/laravel-[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9].log/';
        $files = $this->storage->files(DIRECTORY_SEPARATOR);
        return ['files' => array_filter($files, function($file) use($pattern) {
            preg_match($pattern, $file, $matchs);
            return $matchs[0];
        })];
    }

    public function create(array $attributes)
    {
        $files = $attributes['files'];
        $dataFiles = $this->storage->files(DIRECTORY_SEPARATOR);
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
                    $result = file(storage_path('logs'.DIRECTORY_SEPARATOR.$file), FILE_IGNORE_NEW_LINES);
                    foreach($result as $line) {
                        array_push($data, HttpLogParser::parse($line));
                    }
                }
                $dataLog = array_merge($dataLog, $data);
            }
        }

        return $this->model::insert($dataLog);
    }
}
