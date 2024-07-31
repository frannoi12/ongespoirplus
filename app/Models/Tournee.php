<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tournee extends Model
{
    use HasFactory;

    protected $fillable = [
        "type_tourne",
        "statut",
        "secteur_id",
        "personnel_id",
        "agent"
    ];

    public function personnel(): BelongsTo{
        return $this->belongsTo(Personnel::class);
    }

    public function secteur(): BelongsTo {
        return $this->belongsTo(Secteur::class);
    }



}
