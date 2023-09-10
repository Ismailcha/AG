<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduitIndividual extends Model
{
    use HasFactory;

    // Define the table name explicitly if it's not the default plural of the model name
    protected $table = 'offer_produit_individual';

    // Define the fillable attributes if needed
    protected $fillable = [
        'offer_id',
        'produit_id',
        'quantity',
        'discount',
    ];

    // Define relationships with the Offer and Produit models
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
