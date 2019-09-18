<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use Carbon\Carbon;



class Client extends Authenticatable 
{

    use EntrustUserTrait;
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('api_token','name', 'password','email','date_of_birth','blood_type_id','date_of_last_donation','city_id','phone');


    public function getCanDonateAttribute($value)
    {
        $now = Carbon::now();
        $dateOfLastDonation=new Carbon($this->date_of_last_donation);
        $def=$now->DiffInMonths($dateOfLastDonation);
        return ($def>3)?TRUE:FALSE;
    }

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password']=bcrypt($value);
    // }
    
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }

    public function bloodType()
    {
        return $this->belongsTo('\BloodType', 'blood_type_id');
    }

    public function bloodTypesForDonation()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('\City');
    }

    public function governoratesForDonation()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function donationRequests()
    {
        return $this->belongsToMany('App\Models\DonationRequest');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

}