<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_du',
        'date_au',
        'nombresjours',
        'cause',
    ];

    public function stage(){
        return $this->belongsTo(Stage::class);
    }
}
