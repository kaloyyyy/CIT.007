<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    // Define the table associated with this model
    protected $table = 'addons';

    // Define any relationships (e.g., with orders)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
