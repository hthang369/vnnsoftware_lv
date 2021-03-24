<?php

namespace Modules\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\ConfigsModel;
use Modules\Admin\Forms\ConfigsForm;
use Modules\Admin\Forms\ConfigsHomeForm;
use Modules\Admin\Forms\ConfigsMapForm;
use Modules\Admin\Grids\ConfigsGridInterface;
use Modules\Core\Services\FileManagementService;

class ConfigsRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConfigsModel::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return ConfigsForm::class;
    }

    public function formGenerateConfig($id, $route)
    {
        $config = [
            'url' => $route,
            'model' => $this->getDataConfig($id)
        ];
        return [$config, $this->form()];
    }

    public function formGenerateConfigMap($id, $route)
    {
        $config = [
            'url' => $route,
            'model' => $this->getDataConfig($id)
        ];
        return [$config, ConfigsMapForm::class];
    }

    public function formGenerateConfigHome($id, $route)
    {
        $config = [
            'url' => $route,
            'model' => $this->getDataConfig($id)
        ];
        return [$config, ConfigsHomeForm::class];
    }

    protected function getDataConfig($id)
    {
        $len = strlen($id);
        return $this->getQuery()->where(DB::raw("LEFT(config_name, $len)"), $id)->pluck('config_value', 'config_name');
    }

    public function update(array $attributes, $id)
    {
        $data = $this->getDataConfig($id);

        $attributes = array_merge($data, $attributes);



        return parent::update($attributes, $id);
    }
}
