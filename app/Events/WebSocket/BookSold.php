<?php

namespace App\Events\WebSocket;

use App\Models\Sale;
use App\Http\Resources\SaleResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookSold implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private const SENDING_TYPE = 'to_room';
    private Sale $sale;

    /**
     * Create a new event instance.
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function broadcastWith(): array
    {
        return [
            'sale_id' => $this->sale->id,
            'info_for_client' => [
                'book' => new SaleResource($this->sale),
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
            new PrivateChannel("sales")
        ];
    }

    public function broadcastAs(): string
    {
        return 'BookSold';
    }
}
