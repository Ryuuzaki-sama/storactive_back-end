<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    use HasFactory;

    protected $fillable = [
        'piece_jointe',
        'type_piece_jointe',
        'chemin',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
