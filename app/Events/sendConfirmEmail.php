<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class sendConfirmEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var mixed
     */
    public $email;
    /**
     * @var String
     */
    public $confirmContent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user,String $confirmContent)
    {
        $this->email = $user->email;
        $this->confirmContent = $confirmContent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
