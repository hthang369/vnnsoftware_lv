<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Event;
use Prettus\Repository\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    private $RepositoryCreating = 'Prettus\Repository\Events\RepositoryEntityCreating';
    private $RepositoryUpdating = 'Prettus\Repository\Events\RepositoryEntityUpdating';
    private $RepositoryDeleting = 'Prettus\Repository\Events\RepositoryEntityDeleting';

    protected $listenRepositoryCreating = [];
    protected $listenRepositoryUpdating = [];
    protected $listenRepositoryDeleting = [];
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Prettus\Repository\Events\RepositoryEntityCreating' => [
            'Modules\Core\Listeners\BaseRepositoryCreating'
        ],
        'Prettus\Repository\Events\RepositoryEntityUpdating' => [
            'Modules\Core\Listeners\BaseRepositoryUpdating'
        ],
        'Prettus\Repository\Events\RepositoryEntityDeleting' => [
            'Modules\Core\Listeners\BaseRepositoryDeleting'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->setListenRepositoryCreating();
        $this->setListenRepositoryUpdating();
        $this->setListenRepositoryDeleting();
        parent::boot();
    }

    protected function setListenRepositoryCreating()
    {
        if (is_array($this->listenRepositoryCreating) && count($this->listenRepositoryCreating) > 0) {
            $this->listen[$this->RepositoryCreating] = array_merge($this->listen[$this->RepositoryCreating], $this->listenRepositoryCreating);
        }
    }

    protected function setListenRepositoryUpdating()
    {
        if (is_array($this->listenRepositoryUpdating) && count($this->listenRepositoryUpdating) > 0) {
            $this->listen[$this->RepositoryUpdating] = array_merge($this->listen[$this->RepositoryUpdating], $this->listenRepositoryUpdating);
        }
    }

    protected function setListenRepositoryDeleting()
    {
        if (is_array($this->listenRepositoryDeleting) && count($this->listenRepositoryDeleting) > 0) {
            $this->listen[$this->RepositoryDeleting] = array_merge($this->listen[$this->RepositoryDeleting], $this->listenRepositoryDeleting);
        }
    }
}
