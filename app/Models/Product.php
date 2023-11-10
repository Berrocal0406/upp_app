<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_categories()
    {
        return $this->belongsTo(Product_category::class);
    }

    public function prices()
    {
        return $this->hasOne(Price::class);
    }

    public function skus()
    {
        return $this->hasOne(Sku::class);
    }
}
