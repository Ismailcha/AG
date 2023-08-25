<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'nom','ppv','pph','Laboratoire','photo',
    ];
     public function offre(){
         return $this->BelongsTo(Offre::class);
     }
     public function commande(){
        return $this->BelongsTo(Commande::class);
    }
}
