<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

       //change to appropriate type

    public function __construct(private readonly Message $message)
    {

    }

    public function broadcastOn(): Channel
    {
        return new Channel('chat-rooms-' . $this->message->room_id);
    }

    public function broadcastAs(): string
    {
        return 'message-sent';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->message_id,
            'content' => $this->message->content,
            'author_id' => $this->message->author_id,
            'created_at' => $this->message->created_at
        ];
    }
}
