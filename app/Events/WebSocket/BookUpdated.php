<?php

namespace App\Events\WebSocket;

use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private const SENDING_TYPE = 'to_room';
    public Book $book;

    /**
     * Create a new event instance.
     */
    public function __construct(Book $book, )
    {
        $this->book = $book;
    }

    public function broadcastWith(): array
    {
        return [
            'book_id' => $this->book->id,
            'info_for_client' => [
                'book' => new BookResource($this->book),
            ],
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("books")
        ];
    }

    public function broadcastAs(): string
    {
        return 'BookUpdated';
    }
}
