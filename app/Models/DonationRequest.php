<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name','blood_type_id','age','num_of_bags','hospital_name','latitudes','longitude','governorate_id','phone','notes');


    public function bloodType()
    {
        return $this->belongsTo('\BloodType');
    }

    public function governorate()
    {
        return $this->belongsTo('\Governorate');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client')->withPivot('readed','title','content');
    }

}