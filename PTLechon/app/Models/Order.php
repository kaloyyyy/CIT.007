<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public const CREATED_AT = 'dateOrdered'; // Change the created_at column name
    protected $table = 'orders';
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }



}

