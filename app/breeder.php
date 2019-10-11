<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class breeder extends Model
{
    public function examples()
    {
        return $this->hasMany('App\Ejemplar');
    }
}