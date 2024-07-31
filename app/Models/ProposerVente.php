<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProposerVente extends Model
{
    use HasFactory;

    protected $fillable = [
        "ordure_id",
        "quantite",
        "statut",
        "menage_vendeurs_id",
    ];

    public function menage(): BelongsTo {
        return $this->belongsTo(Menage::class);
    }

    public function ordure(): BelongsTo {
        return $this->belongsTo(Ordure::class);
    }
}
