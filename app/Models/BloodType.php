<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;

    public function clients()
    {
        return $this->hasMany('\Client');
    }

    public function clientsForDonation()
    {
        return $this->belongsToMany('\Client');
    }

}