<?php

namespace App\Console\Commands;

use App\Core\Support\Stub;
use Illuminate\Console\Command;

class MakeFilterCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate files...';

    /**
     * The name of 'name' argument.
     *
     * @var string
     */
    protected $argumentName = 'name';

    protected function getDestinationFilePath()
    {
        return base_path('app'.DIRECTORY_SEPARATOR.'Repositories'.DIRECTORY_SEPARATOR.'Filters');
    }

    protected function getTemplateContents()
    {
        $name = $this->getArgumentName();
        $templateName = 'Filters';

        return new Stub($this->getFileStub($templateName), [
            'NAME' => $name
        ]);
    }

    protected function getFileName()
    {
        return "Where{$this->getArgumentName()}Clause.php";
    }
}
