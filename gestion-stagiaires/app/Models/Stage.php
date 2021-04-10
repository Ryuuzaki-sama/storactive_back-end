<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date_du',
        'date_au',
        'duree',
        'formation',
        'etablissement',
        'intitule_projet',
        'description_projet',
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
