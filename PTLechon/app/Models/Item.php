<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId','productId');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }
}
