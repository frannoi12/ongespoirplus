<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournee extends Model
{
    use HasFactory;

    protected $fillable = [
        "type_tourne",
        "statut",
        "secteur_id",
        "personnel_id"
    ];
}
