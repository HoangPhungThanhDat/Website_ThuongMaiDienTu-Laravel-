<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $table = 'hptd_product_options'; // nếu bạn đặt tên bảng khác

    protected $fillable = [
        'product_id',
        'color',
        'storage', // số GB
        'quantity',
        'price',
        'price_sale',
    ];

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
