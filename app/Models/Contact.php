<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('title','content', 'client_id');


    public function client()
    {
        return $this->belongsTo('\Client');
    }

}