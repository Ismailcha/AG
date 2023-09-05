<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $fillable = ['nom', 'description', 'prixAchat', 'prixVente', 'laboratoire', 'grossiste', 'categorie_id', 'image'];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_produit')
            ->withPivot('quantity', 'discount', 'discounted_price');
    }
}
