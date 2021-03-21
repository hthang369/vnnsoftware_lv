<?php

namespace Modules\Core\Observers;

use Modules\Core\Entities\BaseModel;

class BaseModelObserver
{
    /**
     * Handle the base model "created" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function created(BaseModel $baseModel)
    {
    }

    /**
     * Handle the base model "updated" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function updated(BaseModel $baseModel)
    {
    }

    /**
     * Handle the base model "deleted" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function deleted(BaseModel $baseModel)
    {
    }

    /**
     * Handle the base model "restored" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function restored(BaseModel $baseModel)
    {
    }

    /**
     * Handle the base model "force deleted" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function forceDeleted(BaseModel $baseModel)
    {
    }

    /**
     * Handle the base model "creating" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function creating(BaseModel $baseModel)
    {
    }

    /**
     * Handle the base model "saving" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function saving(BaseModel $baseModel)
    {
        $baseModel->setCreatedUpdatedUsers();
    }

    /**
     * Handle the base model "updated" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function updating(BaseModel $baseModel)
    {
        $baseModel->setCreatedUpdatedUsers();
    }

    /**
     * Handle the base model "deleted" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function deleting(BaseModel $baseModel)
    {
        //
    }

    /**
     * Handle the base model "restored" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     */
    public function restoring(BaseModel $baseModel)
    {
        //
    }
}
