<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public const CREATED_AT = 'dateOrdered'; // Change the created_at column name
    protected $table = 'orders';
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
    public function addon(){
        return $this->belongsTo(Addon::class, 'addonId','addonId');
    }
}

