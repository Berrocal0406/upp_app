<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function imageable():Morphto
    {
        //Una imagen pertenece a una entidad polimórfica
        return $this->morphTo();
        //morphTo significa "transformado a"
    }
    

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
