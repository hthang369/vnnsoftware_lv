<?php

namespace Modules\Core\Responses;

class StubPaginateResponse implements PaginateResponse
{
    public function paginate($data)
    {
        return $data;
    }
}
