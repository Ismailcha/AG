<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    protected $fillable = [
        'nom',
        'type',
        'adress',
        'email',
        'telephone',
        'ICE',
        'Potent',
        'RC',
        'logo',
    ];

    // Define any relationships with other models, if needed
    // Example: public function users() { ... }

    // Define any custom methods or accessors/mutators, if needed
    // Example: public function getFormattedPhoneAttribute() { ... }
}