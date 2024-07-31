<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menage extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "personne_a_contacter",
        "secteur_id",
        "user_id"
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function secteur(): BelongsTo{
        return $this->belongsTo(Secteur::class);
    }

    public function proposerVentes(): HasMany {
        return $this->hasMany(ProposerVente::class);
    }

    public function paiements(): HasMany{
        return $this->hasMany(Paiement::class);
    }
}
