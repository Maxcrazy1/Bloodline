<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function ejemplar()
    {
        return $this->belongsTo('App\Ejemplar');
    }
}
