<?php

namespace App\Events\Admin\MenuWidget;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatedMenuWidgetEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $menuWidget;

    /**
     * Create a new event instance.
     */
    public function __construct($menuWidget)
    {
        $this->menuWidget = $menuWidget;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
