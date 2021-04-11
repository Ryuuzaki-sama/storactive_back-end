<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexe',
        'adresse',
        'tel',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function historiques()
    {
        return $this->hasMany(Historique::class);
    }

    public function isEnabled(){
        // code here
    }
}
