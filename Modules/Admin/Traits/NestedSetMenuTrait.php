<?php

namespace Modules\Admin\Traits;

use Vnnit\Core\Traits\Entities\NestedSetTrait;

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
