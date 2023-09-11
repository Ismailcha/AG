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
        'user_id',
        'escompte',
        'min_total',
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'offer_produit_individual')
            ->withPivot('quantity', 'discount');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
