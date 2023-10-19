<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;


    public function states()
    {
        //Un pais tiene muchos estados
        return $this->hasMany(State::class);
    }
}
