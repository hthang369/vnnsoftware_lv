<?php

namespace Modules\Core\Repositories;

use Modules\Core\Contracts\DataTransformer;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BaseRepository.
 *
 * @package namespace Modules\Core\Repositories;
 */
interface BaseRepository extends RepositoryInterface
{
    /**
     * @param DataTransformer $paginationTransformer
     * @param null|int $limit
     * @param array $columns
     * @param string $method
     * @return mixed
     */
    public function paginateAndTransform(DataTransformer $paginationTransformer, $limit = null, $columns = ['*'], $method = "paginate");

    /**
     * @param string|CriteriaInterface $criteria
     * @return $this
     */
    public function pushCriteria($criteria);

    public function allDataGrid();

    public function formGenerate($route, $actionName, $config = []);
}
