<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = ['name'];

    // You can define relationships here if needed, for example:
    
    // A speciality can belong to many candidates
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class);
    }
}
