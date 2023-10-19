<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentable():Morphto
    {
        //Un comentario se transforma en una entidad polimórfica
        return $this->morphTo();
    }

    public function user():BelongsTo
    {
        //Un comentario pertenece a un usuario
        return $this->belongsTo(User::class);
    }
}
