<?php

namespace App\Observers;

use App\Models\ClientDonationRequest;
use App\Models\Client;
class ClientDonationRequestObserver
{
    /**
     * Handle the client donation request "created" event.
     *
     * @param  \App\Models\ClientDonationRequest  $clientDonationRequest
     * @return void
     */
    public function created(ClientDonationRequest $clientDonationRequest)
    {

        $client=Client::find($clientDonationRequest->client_id);
        $client->num_unreaded_notifications+=1;
        $client->save();
    }

    /**
     * Handle the client donation request "updated" event.
     *
     * @param  \App\Models\ClientDonationRequest  $clientDonationRequest
     * @return void
     */
    public function updated(ClientDonationRequest $clientDonationRequest)
    {
        //
    }

    /**
     * Handle the client donation request "deleted" event.
     *
     * @param  \App\Models\ClientDonationRequest  $clientDonationRequest
     * @return void
     */
    public function deleted(ClientDonationRequest $clientDonationRequest)
    {
        $client=Client::find($clientDonationRequest->client_id);
        // dd($client);
        $client->num_unreaded_notifications-=1;
        $client->save();
    }

    /**
     * Handle the client donation request "restored" event.
     *
     * @param  \App\ClientDonationRequest  $clientDonationRequest
     * @return void
     */
    public function restored(ClientDonationRequest $clientDonationRequest)
    {
        //
    }

    /**
     * Handle the client donation request "force deleted" event.
     *
     * @param  \App\ClientDonationRequest  $clientDonationRequest
     * @return void
     */
    public function forceDeleted(ClientDonationRequest $clientDonationRequest)
    {
        //
    }
}
