<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    public function images()
    {
        return $this->hasMany('App\Media');
    }
}
