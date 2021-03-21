<?php

namespace Modules\Core\Contracts;

interface DataTransformer
{
    /**
     * @param array $data
     * @return array
     */
    public function transform($data);
}
