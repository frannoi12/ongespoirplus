<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Signalement extends Model
{
    use HasFactory;

    protected $fillable = [
        "statut",
        "localisationGps",
        "ville",
        "quartier",
        "personnel_id",
    ];

    public function personnel(): BelongsTo{
        return $this->belongsTo(Personnel::class);
    }
}
