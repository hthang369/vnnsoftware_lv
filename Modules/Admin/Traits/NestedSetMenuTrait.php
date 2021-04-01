<?php

namespace Modules\Admin\Traits;

use Modules\Core\Traits\NestedSetTrait;

/*
 * A trait to handle use full text search
 */

trait NestedSetMenuTrait
{
    use NestedSetTrait;

    public function initializeNestedSetMenuTrait()
    {
        $this->setPrefixColumn('menu');
    }
}
