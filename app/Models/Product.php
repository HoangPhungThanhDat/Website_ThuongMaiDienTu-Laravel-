<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductOption;
class Product extends Model
{
    // use HasFactory;
    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(ProductOption::class, 'product_id', 'id');
    }
}
