<?php

namespace Modules\Admin\Traits;

use Modules\Core\Traits\NestedSetTrait;

/*
 * A trait to handle use full text search
 */

trait NestedSetCategoryTrait
{
    use NestedSetTrait;

    public function initializeNestedSetCategoryTrait()
    {
        $this->setPrefixColumn('category');
    }
}
