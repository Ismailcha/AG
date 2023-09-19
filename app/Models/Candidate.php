<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'date_de_naissance',
        'gender', // Corrected field name
        'ville',
        'disponibilite',
        'avatar',
        'resume_path',
    ];

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }
}
