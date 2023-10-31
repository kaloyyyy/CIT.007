<?php

// app/Models/Client.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public function orders()
    {
        return $this->hasMany(Order::class, 'clientId','clientId');
    }
    public $timestamps = true;
    protected $primaryKey ='clientId';
}
