<?php

namespace Modules\Admin\Traits;

use Kalnoy\Nestedset\NodeTrait;

/*
 * A trait to handle use full text search
 */

trait NestedSetCategoryTrait
{
    use NodeTrait;

    public function initializeNestedSetCategoryTrait() 
    {
        $this->setPrefixColumn('category');
    }
}
