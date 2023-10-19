<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function users()
    {
        //Un nivel tiene muchos usuarios
        return $this->hasMany(User::class);
    }

    public function posts()
    {
        //Relación muchos a través de usuarios con la entidad "Post"
        return $this->hasManyThrough(Post::class, User::class);
    }

    public function videos()
    {
        //Relación muchos a través de usuarios con la entidad "Video"
        return $this->hasManyThrough(Video::class, User::class);
    }
}
