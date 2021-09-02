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
        return [
            'rows'          => $data->items(),
            'total'         => $data->total(),
            'current_page'  => $data->currentPage(),
            'pages'         => $data->lastPage()
        ];
    }
}
