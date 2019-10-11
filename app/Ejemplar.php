<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    // public function images()
    // {
    //     return $this->hasMany('App\Media');
    // }
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
    
    public function breeder()
    {
        return $this->belongsTo('App\breeder');
    }

    public function relations()
    {
        return $this->hasMany('App\relation');
    }
}
