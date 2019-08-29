<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{

    protected $table = 'articles';
    public $timestamps = true;

    public function getFullImgPathAttribute($value)
    {
        return '/images/articles/'.$this->img_path;
    }

    public function getFixedSizeContentAttribute($value)
    {
        return substr($this->content,0,500);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }


}