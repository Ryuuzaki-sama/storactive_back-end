<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'cin',
        'sexe',
        'adresse',
        'tel',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
