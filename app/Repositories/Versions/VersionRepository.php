<?php

namespace App\Repositories\Versions;

use App\Facades\Common;
use Laka\Core\Repositories\BaseRepository;
use App\Models\Versions\Version;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class VersionRepository extends BaseRepository
{
    protected $modelClass = Version::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    public function paginate($limit = null, $columns = [], $method = "paginate")
    {
        return $this->all();
    }

    public function all($columns = [])
    {
        $json = Common::callApi('get', 'https://laka.lampart-vn.com:9443/api/v1/get-version');
        return ['versions' => $json['data']];
    }
}
