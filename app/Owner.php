<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    public function examples()
    {
        return $this->hasMany('App\Ejemplar');
    }
}
