<?php

// Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'seller_name',
        'email',
        'phone_number',
        'city',
        'photo', // Assuming you have a column for storing photo file paths
    ];

    public function itemImages()
    {
        return $this->hasMany(ItemImage::class);
    }

    public function addImages(array $imagePaths)
    {
        foreach ($imagePaths as $imagePath) {
            $this->itemImages()->create(['image_path' => $imagePath]);
        }
    }
}
