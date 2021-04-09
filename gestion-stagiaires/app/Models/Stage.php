<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_du',
        'date_au',
        'formation',
        'etablissement',
        'intitule_projet',
        'description_projet',
    ];
}
