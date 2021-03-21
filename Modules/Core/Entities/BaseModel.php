<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Core\Entities\Concerns\HasTimezone;
use Modules\Core\Observers\BaseModelObserver;
use Modules\ManageOvertimeDayoff\Repositories\ApprovalContentRepository;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Modules\Core\Traits\FullTextSearch;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

/**
 * Class Base.
 *
 * @package namespace Modules\Core\Entities;
 */
abstract class BaseModel extends Model implements Transformable, Presentable
{
    use TransformableTrait, HasTimezone, FullTextSearch, PresentableTrait;

    const CREATED_USER  = 'created_user_id';
    const UPDATED_USER  = 'updated_user_id';
    const TIME_ZONE     = 'timezone';

    protected $translationForeignKey = '';
    protected $auth_user = null;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        //check class use trait
        if (!empty(trait_uses_recursive($this))) {
            $this->replaceTranslationForeignKeyModel($this);
        }

        if (Auth::check()) {
            $this->registerObserver(BaseModelObserver::class);
            $this->auth_user = user_get('employee_id');
        }
    }

    /**
     * Replace Translation ForeignKey Model
     *
     * @param $Class
     *
     * @return void
     * @author quoc_thinh
     * @since  2018-12-04
     */
    private function replaceTranslationForeignKeyModel($Class)
    {
        $pattern    = "/\Model+$/im";
        $foreignKey = preg_replace($pattern, "", class_basename($Class));

        $Class->translationForeignKey = Str::snake($foreignKey) . '_' . $Class->getKeyName();
    }

    /**
     * Sync multiple original attribute with their current values.
     *
     * @param  array|string  $attributes
     * @return $this
     */
    public function syncOriginalAttributes($attributes)
    {
        $attributes = is_array($attributes) ? $attributes : func_get_args();

        foreach ($attributes as $attribute) {
            $this->original[$attribute] = $this->attributes[$attribute];
        }

        return $this;
    }

    public function getEncryptedFields()
    {
        if (isset($this->encrypted) && is_array($this->encrypted)) {
            return $this->encrypted;
        }

        return [];
    }

    /**
     * Update table without update updated_at and created_at
     *
     * @return $this
     */
    public function scopeWithoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }

    public function setCreatedUpdatedUsers()
    {
        if ($this->exists)
            $this->setAttribute(static::UPDATED_USER, $this->auth_user);
        else {
            $this->setAttribute(static::CREATED_USER, $this->auth_user);
            $this->setAttribute(static::UPDATED_USER, $this->auth_user);
        }
    }

    public static function getCreatedUser()
    {
        return static::CREATED_USER;
    }

    public static function getUpdatedUser()
    {
        return static::UPDATED_USER;
    }

    public static function getTimeZone()
    {
        return static::TIME_ZONE;
    }

    public function getAuthUser()
    {
        return $this->auth_user;
    }
}
