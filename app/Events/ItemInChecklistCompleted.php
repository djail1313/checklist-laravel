<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ItemInChecklistCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $checklist_id;

    /**
     * Create a new event instance.
     *
     * @param $checklist_id
     */
    public function __construct($checklist_id)
    {
        $this->checklist_id = $checklist_id;
    }

    /**
     * @return mixed
     */
    public function getChecklistId()
    {
        return $this->checklist_id;
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
