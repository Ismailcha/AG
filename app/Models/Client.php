<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'telephone',
        'email',
        'client_address',
        'billing_address',
    ];
    

   
}