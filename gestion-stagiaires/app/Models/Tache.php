<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'tache',
        'date_tache',
        'stage_id',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
