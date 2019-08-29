<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable =['name','governorate_id'];

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate', 'governorate_id');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function donationRequest()
    {
        return $this->belongsTo('App\Models\DonationRequest');
    }

}