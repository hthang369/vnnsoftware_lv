<?php

namespace Modules\Core\Repositories;

use Modules\Core\Contracts\PaginationTransformer;

class StubPaginationTransformer implements PaginationTransformer
{

    /**
     * @param array $data
     * @return array
     */
    public function transform($data)
    {
        return $data;
    }
}
