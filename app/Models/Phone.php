<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    #MAPEADO
    protected $fillable = [   #Nunca tienes que mapear el id porque es independiente y pensara que quieres cambiarlo
        "phone_number"
    ];

    public function phoneable():Morphto
    {
        //Un telefono pertenece a una entidad polimórfica
        return $this->morphTo();
        //morphTo significa "transformado a"
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
