<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;

    public function products()
    {
        //Una categoria de producto tiene muchos productos
        return $this->hasMany(Product::class);
    }
}
