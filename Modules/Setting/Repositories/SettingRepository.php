<?php


namespace Modules\Setting\Repositories;


use Modules\Setting\Entities\SettingDetailModel;

/**
 * Class SettingRepository
 * @package Modules\Setting\Repositories
 */
class SettingRepository extends SettingBaseRepository
{

    /**
     * @return string
     */
    public function model()
    {
        return SettingDetailModel::class;
    }

    /**
     * @param $key
     * @param string $before
     * @param string $after
     * @return mixed
     */
    public function getSettingByKey($key, $before = '%', $after = '%')
    {
        return $this->model::where('key', 'like', $before . $key . $after)->get()->toArray();
    }
}
