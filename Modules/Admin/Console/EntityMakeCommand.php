<?php

namespace Modules\Admin\Console;

use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class EntityMakeCommand extends GeneratorMultiCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'name';

    /**
     * Single or multi file stubs need generate.
     *
     * @var []
     */
    protected $multiFiles = ['BaseModel', 'Model'];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make-entity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new entity for the specified module.';

    /**
     * Get entity name.
     *
     * @return string
     */
    public function getMultiDestinationFilePath($file_name = null)
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        Stub::setBasePath(str_replace('\\', '/', $path.'Console'.DIRECTORY_SEPARATOR.'stubs'));

        $entityPath = GenerateConfigReader::read('model');

        return $path . $entityPath->getPath() . '/' . $this->getEntityName($file_name) . '.php';
    }

    /**
     * @return string
     */
    protected function getMultiTemplateContents($file_name = null)
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());

        return (new Stub($this->getStubName($file_name), [
            'MODULENAME'        => $module->getStudlyName(),
            'CONTROLLERNAME'    => $this->getEntityName(),
            'NAMESPACE'         => $module->getStudlyName(),
            'CLASS_NAMESPACE'   => $this->getClassNamespace($module),
            'CLASS'             => $this->getEntityNameWithoutNamespace(),
            'LOWER_NAME'        => $module->getLowerName(),
            'MODULE'            => $this->getModuleName(),
            'NAME'              => $this->getModuleName(),
            'STUDLY_NAME'       => $module->getStudlyName(),
            'MODULE_NAMESPACE'  => $this->laravel['modules']->config('namespace'),
        ]))->render();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::OPTIONAL, 'The name of the entity class.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['plain', 'p', InputOption::VALUE_NONE, 'Generate a plain entity', null],
        ];
    }

    /**
     * @return array|string
     */
    protected function getEntityName($file_name = null)
    {
        $module_name = $this->getModuleName();

        $entity = studly_case($this->argument('name')) ?: $module_name;

        return $entity.$file_name;
    }

    /**
     * @return array|string
     */
    private function getEntityNameWithoutNamespace()
    {
        return class_basename($this->getEntityName());
    }

    public function getDefaultNamespace() : string
    {
        return $this->laravel['modules']->config('paths.generator.model.path', 'Entities');
    }

    /**
     * Get the stub file name based on the plain option
     * @return string
     */
    private function getStubName($file_name = null)
    {
        return '/entities/'.$file_name.'.stub';
    }
}
