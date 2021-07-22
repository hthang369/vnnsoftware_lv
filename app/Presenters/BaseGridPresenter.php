<?php

namespace App\Presenters;

use App\Contracts\PresenterInterface;
use App\Facades\Common;
use App\Helpers\Attributes;
use App\Helpers\Classes;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class BaseGridPresenter implements PresenterInterface
{
    private $fields = [];
    private $indexName = 'index';
    private $actionName = 'action';

    protected $indexColumnOptions = [];
    protected $actionColumnOptions = [];
    private $template = [
        'fields'        => [],
        'rows'          => [],
        'total'         => 0,
        'pages'         => 0,
        'currentPage'   => 0,
        'from'          => 0,
        'to'            => 0
    ];

    protected function setColumns()
    {
        return [];
    }

    private function getSectionCode()
    {
        return Common::getSectionCode();
    }

    private function getIndexOptions()
    {
        return array_merge(['sortable' => false], $this->indexColumnOptions);
    }

    private function getActionOptions()
    {
        return array_merge(['sortable' => false, 'cell' => 'tables.action'], $this->actionColumnOptions);
    }

    protected function getColumns()
    {
        $fields = collect($this->fields);
        $indexColumn = Attributes::getField($this->indexName, trans('table.index'), $this->getIndexOptions());
        $indexColumn['class'] = Classes::get(['table-index', $indexColumn['class']]);
        $fields->push($indexColumn);
        $fields = $fields->merge($this->setColumns());
        $actionColumn = Attributes::getField($this->actionName, trans('table.action'), $this->getActionOptions());
        $actionColumn['class'] = Classes::get(['table-action', $actionColumn['class']]);
        $fields->push($actionColumn);

        return $fields->all();
    }

    private function parseRows($data)
    {
        $range = range($data->firstItem(), $data->lastItem());
        return collect($data->items())->map(function(&$item, $key) use($range) {
            if (method_exists($this, 'customItemData')) {
                $item = call_user_func([$this, 'customItemData'], $item);
            }
            if (blank($item->{$this->indexName})) {
                data_set($item, $this->indexName, $range[$key]);
            }
            if (blank($item->{$this->actionName})) {
                $actions = [
                    $this->getEditActionBtn($item),
                    $this->getDetailActionBtn($item),
                    $this->getDeleteActionBtn($item)
                ];
                data_set($item, $this->actionName, $actions);
            }
            return $item;
        })->all();
    }

    private function getEditActionBtn($item)
    {
        return Attributes::getFieldButton('edit', '', [
            'class' => 'btn-primary',
            'icon' => 'far fa-edit',
            'title' => trans('table.btn_edit'),
            'visible' => $this->visibleEdit($item)
        ]);
    }

    private function getDetailActionBtn($item)
    {
        return Attributes::getFieldButton('show', '', [
            'class' => 'btn-info',
            'icon' => 'fas fa-info-circle',
            'title' => trans('table.btn_detail'),
            'visible' => $this->visibleDetail($item)
        ]);
    }

    private function getDeleteActionBtn($item)
    {
        return Attributes::getFieldButton('destroy', '', [
            'class' => 'btn-danger',
            'icon' => 'far fa-trash-alt',
            'title' => trans('table.btn_delete'),
            'visible' => $this->visibleDelete($item)
        ]);
    }

    protected function visibleEdit($item)
    {
        return user_can("edit_{$this->getSectionCode()}");
    }

    protected function visibleDetail($item)
    {
        return user_can("view_{$this->getSectionCode()}");
    }

    protected function visibleDelete($item)
    {
        return user_can("delete_{$this->getSectionCode()}");
    }

    /**
     * Prepare data to present
     *
     * @param $data
     *
     * @return mixed
     */
    public function present($results)
    {
        if ($results instanceof LengthAwarePaginator) {
            return $this->parsePresent($results, $results->total());
        }
        return $results;
    }

    protected function parsePresent($results, $total)
    {
        return array_merge($this->template, [
            'fields'        => $this->getColumns(),
            'rows'          => method_exists($results, 'items') ? $this->parseRows($results) : $results,
            'total'         => $total,
            'pages'         => method_exists($results, 'lastPage') ? $results->lastPage() : 0,
            'currentPage'   => method_exists($results, 'currentPage') ? $results->currentPage() : 0,
            'from'          => method_exists($results, 'firstItem') ? $results->firstItem() : 0,
            'to'            => method_exists($results, 'lastItem') ? $results->lastItem() : 0
        ]);
    }
}
