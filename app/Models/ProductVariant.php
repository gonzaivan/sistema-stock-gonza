<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'material',
        'cost',
        'price',
        'stock',
        'stock_alert',
        'sku'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}