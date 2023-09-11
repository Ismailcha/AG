<?php

// ItemImage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path']; // Add 'image_path' to the fillable array

    // Rest of your model code...
}
