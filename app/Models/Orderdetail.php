<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetail';
    public $timestamps = false; // Tắt timestamps
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}