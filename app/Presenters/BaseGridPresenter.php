<?php

namespace App\Presenters;

use App\Contracts\PresenterInterface;
use App\Helpers\Attributes;
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
        $fields->push(Attributes::getField($this->indexName, trans('table.index'), $this->getIndexOptions()));
        $fields = $fields->merge($this->setColumns());
        $fields->push(Attributes::getField($this->actionName, trans('table.action'), $this->getActionOptions()));

        return $fields->all();
    }

    private function parseRows($data)
    {
        $range = range($data->firstItem(), $data->lastItem());
        return collect($data->items())->map(function(&$item, $key) use($range) {
            if (blank($item->{$this->indexName})) {
                data_set($item, $this->indexName, $range[$key]);
            }
            if (blank($item->{$this->actionName})) {
                $actions = [
                    Attributes::getFieldButton('edit', trans('table.btn_edit'), ['class' => 'btn-primary']),
                    Attributes::getFieldButton('show', trans('table.btn_detail'), ['class' => 'btn-info']),
                    Attributes::getFieldButton('destroy', trans('table.btn_delete'), ['class' => 'btn-danger'])
                ];
                data_set($item, $this->actionName, $actions);
            }
            return $item;
        })->all();
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
