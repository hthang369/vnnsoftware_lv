<?php

namespace Modules\Core\Plugins\VueTables;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Core\Contracts\DataTransformer;

class VueTablesPaginationTransformer implements DataTransformer
{

    /**
     * @param LengthAwarePaginator $data
     * @return array
     */
    public function transform($data)
    {
        return [
            'rows' => $data->items(),
            'total' => $data->total(),
//            'limit' => $data->perPage(),
//            'page' => $data->currentPage(),
//            'orderBy' => request()->query('orderBy'),
//            'ascending' => request()->query('ascending') == 1 ? 'ASC' : 'DESC',
        ];
    }
}
