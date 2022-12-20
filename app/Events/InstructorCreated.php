<?php

namespace App\Events;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InstructorCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $instructor;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Instructor $instructor)
    {
      $this->instructor  =  $instructor;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
