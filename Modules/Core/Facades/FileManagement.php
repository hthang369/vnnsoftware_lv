<?php

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;

class FileManagement extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'file-management';
    }
}
