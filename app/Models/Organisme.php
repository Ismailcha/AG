<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organisme extends Model
{
    use HasFactory;
    protected $table = 'organismes';
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
