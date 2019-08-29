<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientDonationRequest extends Model 
{

    protected $table = 'client_donation_request';
    public $timestamps = true;
    protected $fillable = array('client_id','donation_request_id');


    // protected $dispatchesEvents = [
    //     'created' => ClientDonationRequestCreated::class,
    //     'deleted' => ClientDonationRequestDeleted::class,
    // ];

}