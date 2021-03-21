<?php

namespace Modules\Core\Repositories;

use Modules\Setting\Facade\Setting;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Schema;

abstract class BaseCriteriaEloquent implements CriteriaInterface
{
    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $commonFilters = [];

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $customFilters = [];

    /**
     * Registered sorts to operate upon.
     *
     * @var array
     */
    protected $commonSorts = [];

    /**
     * Registered sorts to operate upon.
     *
     * @var array
     */
    protected $customSorts = [];

    public function clearAll()
    {
        $this->clearFilter();
        $this->clearSort();
    }

    public function clearFilter()
    {
        $this->commonFilters = [];
        $this->customFilters = [];
    }

    public function clearSort()
    {
        $this->commonSorts = [];
        $this->customSorts = [];
    }

    /**
     * @param array $filters
     */
    public function setFilter($filters)
    {
        foreach ($filters as $key => $value) {
            if (method_exists($this, $key . 'Filter')) {
                $this->customFilters[$key] = is_array($value) ? $value['value'] : $value;
            } else {
                $this->commonFilters[$key] = $value;
            }
        }
    }

    /**
     * @param array $sorts
     */
    public function setSort($sorts)
    {
        foreach ($sorts as $key => $value) {
            if (is_numeric($key)) {
                if (method_exists($this, $value . 'Sort')) {
                    $this->customSorts[$value] = 'asc';
                } else {
                    $this->commonSorts[$value] = 'asc';
                }
            } else {
                if (method_exists($this, $key . 'Sort')) {
                    $this->customSorts[$key] = $value;
                } else {
                    $this->commonSorts[$key] = $value;
                }
            }
        }
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $this->builder = $model;

        $this->applyFilter();
		$this->applyFullTextSearch();
        $this->applySort();

        return $this->builder;
    }

    /**
     * @return void
     */
    protected function applyFilter()
    {
		$model = $this->builder->getModel();
		$table_name = $model->getTable();
		$searchable = $model->getSearchable();
		$commonFilters = array_diff_key($this->commonFilters, array_flip($searchable));
		$customFilters = array_diff_key($this->customFilters, array_flip($searchable));
		
        foreach ($commonFilters as $column => $value) {
			$column_name = Schema::hasColumn($table_name,$column) ? $table_name.'.'.$column : $column;
			$this->builder = $this->builder->{$value['method']}($column_name, ...$value['parameters']);
        }

        foreach ($customFilters as $filterName => $value) {
			$this->builder = $this->{$filterName . 'Filter'}($value);
        }
    }
	
	/**
     * @return void
     */
	protected function applyFullTextSearch()
	{
		$model = $this->builder->getModel();
		if($model->hasSearchables()) {
			$searchable = $model->getSearchable();
			$commonFilters = array_intersect_key($this->commonFilters, array_flip($searchable));
			$customFilters = array_intersect_key($this->customFilters, array_flip($searchable));
			
			foreach ($commonFilters as $column => $value) {
				$this->builder = $model->scopeFullTextSearch($this->builder, $column, ...$value['parameters']);
			}
			
			foreach ($customFilters as $filterName => $value) {
				$this->builder = $model->scopeFullTextSearch($this->builder, $filterName, $value);
			}
		}
	}

    /**
     * @return void
     */
    public function applySort()
    {
        foreach ($this->commonSorts as $column => $direction) {
            $this->builder = $this->builder->orderBy($column, $direction);
        }

        foreach ($this->customSorts as $sortName => $direction) {
            $this->builder = $this->{$sortName . 'Sort'}($direction);
        }
    }
    
    public function filterFullTextSearch($column_name, $value)
    {
        return $this->builder->getModel()->scopeFullTextSearch($this->builder, $column_name, trim($value));
    }

    /**
     * applyFilterColumn
     *
     * @param DB      $column
     * @param array   $value
     * @param string  $method
     * @param string  $operator
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function applyFilterColumn($column, $value, $method = 'where', $operator = '=')
    {
        if (is_array($value)) {
            // Criteria for start_date and end_date
            if (isset($value['start']) && isset($value['end'])) {
                return $this->builder->whereBetween($column, [$value['start'],$value['end']]);
            }
        } else {
            return $this->builder->{$method}($column, $operator, $value);
        }
    }

    /**
     * convert_tz_column
     * @param DB $columnName
     *
     * @return string
     */
    public function convert_tz_column($columnName)
    {
        $timeZone = timezone_offset_string(Setting::getLocalTimezone());
        return "CONVERT_TZ($columnName,'+00:00','$timeZone')";
    }
}
