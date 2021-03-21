<?php

namespace Modules\Core\Entities\Concerns;

trait ActivityEvent
{
    protected $CREATED_USER = 'created_user_id';
    protected $UPDATED_USER = 'updated_user_id';
    /**
     * Listen for events on model and capture the
     * appropriate activities.
     *
     * @return void
     */
    protected static function bootActivityEvent()
    {

        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->captureActivity($event);
            });
        }
    }

    protected static function getModelEvents()
    {
        if (isset(static::$capturedEvents)) {
            return static::$capturedEvents;
        }

        return ['saving', 'creating', 'updating', 'deleting'];
    }

    public function captureActivity($event)
    {
        // print_r($event.' => '.get_class($this));
        $this->setCreatedUpdatedUsers();
    }

    public function getCreatedUser()
    {
        return $this->CREATED_USER;
    }

    public function getUpdatedUser()
    {
        return $this->UPDATED_USER;
    }

    public function setCreatedUpdatedUsers()
    {
        $auth_user = user_get('employee_id');
        if($this->exists)
            $this->setAttribute($this->UPDATED_USER, $auth_user);
        else {
            $this->setAttribute($this->CREATED_USER, $auth_user);
            $this->setAttribute($this->UPDATED_USER, $auth_user);
        }
    }

    public function freshTimestampsUser()
    {
        if($this->usesTimestamps())
            $this->updateTimestamps();
        $this->setCreatedUpdatedUsers();
    }
}
