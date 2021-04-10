<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'status',
        'date_creation',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
