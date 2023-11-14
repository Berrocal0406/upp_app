<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        //Un post pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        //un post pertenece a una categoría
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        //Un post tiene muchos comentarios
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        //Un post tiene muchos likes
        return $this->morphMany(Like::class, 'likeable');
    }

    public function image()
    {
        //Un post tiene una imagen
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags()
    {
        //Un post tiene muchas etiquetas
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
