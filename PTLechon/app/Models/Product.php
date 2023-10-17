<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // Specify the table name
    public $id = 'productId';
    protected $fillable = [
        'price',
        'description',
    ];

    // Add any additional methods, relationships, or configuration as needed
}
