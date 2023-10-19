<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    #MAPEADO
    protected $fillable = [   #Nunca tienes que mapear el id porque es independiente y pensara que quieres cambiarlo
        'instagram',
        'github',
        'web',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
