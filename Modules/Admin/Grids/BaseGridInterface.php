<?php

namespace Modules\Admin\Grids;

use Leantony\Grid\GridInterface;

interface BaseGridInterface extends GridInterface
{
    public function pageSize();
}
