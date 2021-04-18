<?php

namespace Modules\Admin\Console;

use Illuminate\Support\Str;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;

class RepositoryMakeCommand extends GeneratorMultiCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument name.
     *
     * @var string
     */
    protected $argumentName = 'name';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make-repository';

    /**
     * Single or multi file stubs need generate.
     *
     * @var []
     */
    protected $multiFiles = ['BaseRepository', 'Criteria', 'Repository'];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class for the specified module.';

    public function getDefaultNamespace() : string
    {
        $module = $this->laravel['modules'];

        return $module->config('paths.generator.repository.namespace') ?: $module->config('paths.generator.repository.path', 'Repositories');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::OPTIONAL, 'The name of the repository class.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    /**
     * @return mixed
     */
    protected function getMultiTemplateContents($fileName = null)
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());

        return (new Stub($this->getStubName($fileName), [
            'NAMESPACE' => $this->getClassNamespace($module),
            'CLASS'     => $this->getFileName($fileName),
            'CLASSNAME'     => $this->getClass(),
            'MODULE'    => $this->getModuleName()
        ]))->render();
    }

    /**
     * @return mixed
     */
    protected function getMultiDestinationFilePath($fileName = null)
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        Stub::setBasePath(str_replace('\\', '/', $path.'Console'.DIRECTORY_SEPARATOR.'stubs'));

        $requestPath = GenerateConfigReader::read('repository');

        return $path . $requestPath->getPath() . '/' . $this->getFileName($fileName) . '.php';
    }

    /**
     * @return string
     */
    private function getFileName($fileName)
    {
        $moduleName = $this->getModuleName();
        $name = Str::studly($this->argument('name')) ?: $moduleName;
        return $name.$fileName;
    }

    /**
     * Get the stub file name based on the plain option
     * @return string
     */
    private function getStubName($file_name)
    {
        return '/Repositories/'.$file_name.'.stub';
    }
}
