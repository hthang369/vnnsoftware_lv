<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateActionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:generate-action {name} {module} {--api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate action in module.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $apiOption = $this->option('api');
        $moduleName = $this->argument('module');
        if (!$apiOption) {
            $moduleNamespace = str_replace('Grids', '', config('grid.generation.namespace'));
            $this->call('module:make-core-controller', ['name' => $name, 'module' => $moduleName]);
            $this->call('module:make-entity', ['name' => $name, 'module' => $moduleName]);
            $this->call('module:make-repository', ['name' => $name, 'module' => $moduleName]);
            $this->call('module:make-validator', ['name' => $name.'Validator', 'module' => $moduleName]);
            $this->call('module:make-response', ['name' => $name.'Response', 'module' => $moduleName]);
            $this->call('module:make-grid', ['name' => $name,'module' => $moduleName,'--model' => $moduleNamespace.'Entities'.'\\'.$name.'Model']);
            $this->call('make:form', ['name' => $name.'Form','--namespace' => $moduleNamespace.'Forms','--path' => $moduleNamespace.'Forms']);
        } else {
            // $this->call('module:make-api-controller', ['name' => $name, 'module' => $moduleName]);
            // $this->call('module:make-entity', ['name' => $name, 'module' => $moduleName]);
            // $this->call('module:make-repository', ['name' => $name, 'module' => $moduleName]);
            $this->call('module:make-validator', ['name' => $name.'Validator', 'module' => $moduleName]);
            $this->call('module:make-response', ['name' => $name.'Response', 'module' => $moduleName]);
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'An name argument.'],
            ['module', InputArgument::REQUIRED, 'An module argument.']
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
            // ['module', null, InputOption::VALUE_OPTIONAL, 'An module option.', null],
        ];
    }
}
