<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\ClientDonationRequest;

class ClientDonationRequestEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

    public function clientDonationRequestCreated(ClientDonationRequest $item)

    {
        $client=Client::find($item->client_id);
        // dd($client);
        $client->num_unreaded_notifications=5;
        $client->save();

    }



    /**

     * Get the channels the event should broadcast on.

     *

     * @return \Illuminate\Broadcasting\Channel|array

     */

    public function clientDonationRequestUpdated(ClientDonationRequest $item)

    {

        Log::info("Item Updated Event Fire: ".$item);

    }
}
