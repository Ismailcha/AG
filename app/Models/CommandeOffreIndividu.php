<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeOffreIndividu extends Model
{
    use HasFactory;

    protected $table = 'commande_offre_individus';

    protected $fillable = [
        'offer_id',
        'produit_id',
        'user_id',
        'quantite',
        'discount',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
