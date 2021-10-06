<?php

namespace Modules\Admin\Grids;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\HtmlString;
use Vnnit\Core\Grids\BaseGridPresenter;

class PermissionRoleGrid extends BaseGridPresenter
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Permission Role';

    protected $sectionCode = 'role_has_permissions';

    protected $actionColumnOptions = ['visible' => false];

    protected function getActionButtons()
    {
        return array_filter([
            'save' => user_can('add_'.$this->sectionCode)
        ]);
    }

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
		    // "no" => [
		    //     "label" => "ID",
		    //     "filter" => [
		    //         "enabled" => false,
		    //         "operator" => "="
		    //     ],
		    //     "styles" => [
		    //         "column" => "grid-w-10"
		    //     ]
		    // ],
		    // "section_code" => [
		    //     "search" => [
		    //         "enabled" => true
		    //     ],
		    //     "filter" => [
		    //         "enabled" => false,
		    //     ]
		    // ],
		    // "action" => [
		    //     "filter" => [
		    //         "enabled" => false,
            //     ],
            //     'raw' => true,
            //     'data' => function ($columnData, $columnName) {
            //         $permissions = json_decode($columnData['permission'], true);
            //         $section_actions = config('permission.section_action');
            //         $actions = config('permission.actions');
            //         $listAction = [];
            //         foreach($permissions as $key => $value) {
            //             if (!in_array($key, data_get($section_actions, $columnData['section_code'], $actions))) continue;
            //             $name = sprintf('%s_%s', $key, $columnData['section_code']);
            //             $listAction[] = $this->getTemplateAction($name, $value, $key);
            //         }
            //         return new HtmlString(implode(' ', $listAction));
            //         // like for instance, displaying an image on the grid...
            //         // return new HtmlString(sprintf('<img src="%s" class="img-responsive" alt = "%s" width="40">', asset('storage/data/upload/images/'.$columnData->{$columnName}), 'alternative'));
            //     },
		    // ]

		];
    }

    private function getTemplateAction($name, $value, $key)
    {
        return '<div class="custom-control custom-checkbox custom-control-inline">'.
            Form::checkbox($name, null, $value, ['id' => $name, 'class' => 'custom-control-input']).
            Form::label($name, $key, ['class' => 'custom-control-label'])
            .'</div>';
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        $this->clearAllButtons();
        parent::configureButtons();
        $this->makeCustomButton([
            'name' => 'Save',
            'pjaxEnabled' => true,
            'gridId' => 'frmPermissionRole',
            'dataAttributes' => ['form-id' => 'frmPermissionRole'],
            'class' => 'btn btn-info btn-save',
            'renderIf' => function () {
                return in_array('save', $this->buttonsToGenerate);
            }
        ], static::$TYPE_TOOLBAR);
    }
}
