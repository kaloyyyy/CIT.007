<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   // public const CREATED_AT = 'dateOrdered'; // Change the created_at column name
    protected $table = 'orders';
    public $timestamps = true;

    public function client()
    {
        return $this->belongsTo(Client::class, 'clientId','clientId');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'orderId','orderId');
    }


}

