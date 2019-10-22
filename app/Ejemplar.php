<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    # This property!
    // protected $fillable = ['name','birthday','color','genre','type_register','location','birth_location','breeder_id','owner_id'];

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

    //Scope
    public function scopeGenre($query, $genre)
    {
        if ($genre) {
            return $query->where('genre', 'LIKE', "%$genre%");
        }

    }
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }

    }
    public function scopeColor($query, $color)
    {
        if ($color) {
            return $query->where('color', 'LIKE', "%$color%");
        }

    }

    public function scopeRaza($query, $raza)
    {
        if ($raza) {
            return $query->where('raza', 'LIKE', "%$raza%");
        }

    }
    }