<?php

namespace Modules\Admin\Console;

use Illuminate\Database\Eloquent\Model;
use Leantony\Grid\HasGridConfigurations;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GridMakeCommand extends GeneratorMultiCommand
{
    use HasGridConfigurations, ModuleCommandTrait;

    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'name';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-grid {name} {module} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a grid from an eloquent model.';

    /**
     * Single or multi file stubs need generate.
     *
     * @var []
     */
    protected $multiFiles = ['GridInterface', 'Grid'];

    /**
     * Skip this columns. These would not be considered on the grid, regardless of fillable status or not
     *
     * @var array
     */
    protected $excludedColumns = [];

    /**
     * Get entity name.
     *
     * @return string
     */
    public function getMultiDestinationFilePath($file_name = null)
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $this->excludedColumns = $this->getGridColumnsToSkipOnGeneration();

        $gridPath = GenerateConfigReader::read('grid');

        return $path . $gridPath->getPath() . '/' . $this->getFileName($file_name) . '.php';
    }

     /**
     * @return string
     */
    protected function getMultiTemplateContents($file_name = null)
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());

        $suppliedModel = $this->getModelOption();

        if ($suppliedModel === null) {
            $this->error("Please supply a model name.");
            die(-1);
        }

        list($model, $rows) = $this->generateRows($suppliedModel);

        return (new Stub($this->getStubName($file_name), [
            'MODULE'            => $this->getModuleName(),
            'CLASS'             => $this->getClass(),
            'TABLENAME'         => studly_case($model->getTable()),
            'ROWS'              => var_export54($rows, "\t\t") . ';',
            'ROUTEROOT'         => str_plural(strtolower(class_basename($model))),
            'MODELPK'           => $model->getKeyName(),
            'LINKABLE'          => 'false'
        ]))->render();
    }

    /**
     * Get the stub file name based on the plain option
     * @return string
     */
    private function getStubName($file_name = null)
    {
        return '/grids/'.$file_name.'.stub';
    }

    /**
     * @return string
     */
    private function getFileName($fileName)
    {
        $moduleName = $this->getModuleName();
        $name = studly_case($this->argument('name')) ?: $moduleName;
        return $name.$fileName;
    }

    /**
     * Get the model to be used
     *
     * @return array|string
     */
    protected function getModelOption()
    {
        $model = trim($this->option('model'));
        return $model;
    }

    /**
     * Generate grid rows for this model
     *
     * @param $model
     * @return array|bool
     * @throws \Exception
     */
    protected function generateRows($model)
    {
        $columns = [];

        $model = app($model);

        if (!$model instanceof Model) {

            $this->error("Invalid model supplied.");

            die(-1);
        }

        // primary key
        $model->getKeyName();

        // cols
        $columns = array_merge($columns, [$model->getKeyName()]);

        // use only fillable cols
        $columns = array_merge($columns, $model->getFillable());

        // timestamps. skip updated_at
        if ($model->timestamps) {
            $columns = array_merge($columns, [$model->getCreatedAtColumn()]);
        }

        // skip column exclusions
        $rows = collect($columns)->reject(function ($v) {
            return in_array($v, $this->excludedColumns);

        })->map(function ($columnName) {
            if ($columnName === 'id') {
                // a pk
                return [
                    $columnName => [
                        'label' => 'ID',
                        'filter' => [
                            'enabled' => true,
                            'operator' => '='
                        ],
                        'styles' => [
                            // will apply a column width class of 10 percent
                            'column' => 'grid-w-10',
                        ]
                    ],
                ];
            } else {
                if (ends_with($columnName, '_id')) {
                    // a join column
                    return [
                        $columnName => [
                            'filter' => [
                                'enabled' => true,
                                'type' => 'select',
                                'data' => [] // add a key value pair that will be rendered on a drop-down
                            ],
                            'export' => false,
                        ],
                    ];
                } else {
                    if (ends_with($columnName, '_at')) {
                        // a date column
                        return [
                            $columnName => [
                                'sort' => false,
                                'date' => 'true',
                                'filter' => [
                                    'enabled' => true,
                                    'type' => 'date',
                                    'operator' => '<='
                                ],
                            ],
                        ];
                    } else // any other column
                    {
                        return [
                            $columnName => [
                                'search' => [
                                    'enabled' => true,
                                ],
                                'filter' => [
                                    'enabled' => true,
                                    'operator' => '='
                                ],
                            ],
                        ];
                    }
                }
            }
        });

        $this->info("Grid generated shall render " . $rows->count() . ' rows for model ' . class_basename($model));

        return [$model, $rows->collapse()->toArray()];
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::OPTIONAL, 'The name of the grid class.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
