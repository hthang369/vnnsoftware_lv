<?php


namespace Modules\Setting\Repositories;


use Modules\Setting\Entities\SettingDetailModel;
use Modules\Setting\Forms\SettingsForm;
use Modules\Setting\Forms\SettingsHomeForm;
use Modules\Setting\Forms\SettingsMapForm;

/**
 * Class SettingRepository
 * @package Modules\Setting\Repositories
 */
class SettingRepository extends SettingBaseRepository
{
    protected $listFormData = [
        'info' => SettingsForm::class,
        'map' => SettingsMapForm::class,
        'home' => SettingsHomeForm::class,
    ];
    /**
     * @return string
     */
    public function model()
    {
        return SettingDetailModel::class;
    }

    public function formGenerateConfig($id, $route)
    {
        $config = [
            'url' => $route,
            'model' => $this->getDataConfig($id)
        ];
        return [$config, $this->listFormData[$id]];
    }

    protected function getDataConfig($id)
    {
        return $this->getQuery()->join('settings', 'settings.id', '=', 'setting_details.setting_id')->where('name', $id)->pluck('value', 'key')->toArray();
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
