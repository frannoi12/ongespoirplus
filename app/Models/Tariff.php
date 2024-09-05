<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tariff extends Model
{
    use HasFactory;

    protected $fillable = [
        "designation",
        "montant",
        "personnel_id"
    ];

    public function personnel(): BelongsTo {
        return $this->belongsTo(Personnel::class);
    }

    public function paiements(): HasMany {
        return $this->hasMany(Paiement::class);
    }

    public function menages(): HasMany {
        return $this->hasMany(Menage::class);
    }
}
