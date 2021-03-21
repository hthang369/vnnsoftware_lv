<?php

namespace Modules\Core\Entities\Concerns;

use Carbon\Carbon as BaseCarbon;
use DateTimeInterface;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Support\Carbon as Carbon;
use Modules\Setting\Facade\Setting;

trait HasTimezone
{
    protected static $timezoneSerialize = true;

    public static function disableTimezoneConvert() {
        static::$timezoneSerialize = false;
    }

    public static function enableTimezoneConvert() {
        static::$timezoneSerialize = true;
    }

    public function fromDateTime($value)
    {
        if ($value instanceof BaseCarbon) {
            $value->tz = config('app.timezone');
        }
        return parent::fromDateTime($value);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        if (strtotime($date) < 0 ) {
            return null;
        }
        if (config('core.timezoneSerialize') && static::$timezoneSerialize && $date instanceof BaseCarbon) {
            if (Auth::check()) {
                $date->tz = Auth::user()->getTimezone();
            }
        }
        return parent::serializeDate($date);
    }

    protected function castAttribute($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }
        switch ($this->getCastType($key)) {
            case 'time':
                $this->setDateFormat(DEFAULT_TIME_FORMAT);
                $result = $this->asDateTime($value);
                $this->setDateFormat(null);
                return $result;
            break;
            default:
                return parent::castAttribute($key, $value);
            break;
        }
    }

    protected function getCastType($key)
    {
        $type = parent::getCastType($key);
        if(starts_with($type,'time'))
            return 'time';
        return $type;
    }

    public function scopeTodayTz($query, $column)
    {
        $today = Carbon::now();
        return $this->scopeDateTz($query, $column, '=', $today);
    }

    public function scopeDateTz($query, $column, $operator, Carbon $value)
    {
        $date = $value->clone();
        $date->tz = Setting::getLocalTimezone();
        $start = $date->clone()->setHour(0)->setMinute(0)->setSecond(0);
        $end = $date->clone()->setHour(23)->setMinute(59)->setSecond(59);
        $start->tz = config('app.timezone');
        $end->tz = config('app.timezone');

        switch ($operator) {
            case '=':
                return $query->whereBetween($column, [$start, $end]);
            case '>':
            case '>=':
                return $query->where($column, $operator, $start);
            case '<':
            case '<=':
                return $query->where($column, $operator, $end);
        }

        return $query;
    }
}
