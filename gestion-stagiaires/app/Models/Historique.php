<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
