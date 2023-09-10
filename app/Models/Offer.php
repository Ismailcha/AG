<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'offre_name',
        'laboratoire',
        'grossiste',
        'date_start',
        'date_end',
        'escompte',
        'min_total',
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'offer_produit')
            ->withPivot('quantity', 'discount', 'discounted_price');
    }
    public function offerProduitIndividuals()
    {
        return $this->hasMany(Offer_Produit_Individual::class);
    }
}
