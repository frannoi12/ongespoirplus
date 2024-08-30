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
        "type_menage",
        "politique",
        "code",
        "personne_a_contacter",
        "secteur_id",
        "user_id",
        "tariff_id",
        'service_id',
        'localisation',
    ];

    protected $casts = [
        'localisation' => 'array',  // Convertit automatiquement JSON en tableau PHP
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

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class); // Ajouter cette ligne
    }

    public function tariff(): BelongsTo {
        return $this->belongsTo(Tariff::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Événement de suppression
        static::deleting(function ($menage) {
            // Supprimer les paiements associés
            $menage->paiements()->delete();

            // Supprimer l'utilisateur associé, si nécessaire
            if ($menage->user_id) {
                $user = $menage->user; // Récupère l'utilisateur associé
                if ($user) {
                    $user->delete(); // Supprime l'utilisateur
                }
            }
        });
    }
}
