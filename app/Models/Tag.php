<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts():MorphToMany
    {
        //Una etiqueta tiene muchos post, esta es la entidad madre
        return $this->morphedByMany(Post::class, 'taggable');
        //morphedByMany significa "transformando a muchos"
    }

    public function videos():MorphToMany
    {
        //Un video tiene muchas etiquetas
        return $this->morphedByMany(Video::class, 'taggable');
    }

    // public function users()
    // {
    //     return $this->morphedByMany(Usuarios::class, 'taggable');
    // }
}
