<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model 
{

    protected $table = 'configs';
    public $timestamps = true;
    protected $fillable =['android_app_url','fb','twitter','inst','whats','google','phone',
    'about','home','notification_config'];

}

