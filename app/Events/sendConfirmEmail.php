<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class sendConfirmEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var mixed
     */
    public $email;
    public $user_name;
    /**
     * @var String
     */
    public $confirmContent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, string $confirmContent)
    {
        $this->email = $user->email;
        $this->user_name = $user->name;
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
