<?php
namespace Veneridze\LaravelMessanger\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Veneridze\LaraverMessanger\Models\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Veneridze\LaraverMessanger\Models\Chat;

 
class NewChat implements ShouldQueue
{
    /**
     * Create a new event instance.
     */
    public function __construct(public Chat $chat)
    {
        //
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