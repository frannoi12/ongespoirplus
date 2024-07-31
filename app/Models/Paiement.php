<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        "tarrif_id",
        "personnel_id"
    ];

    public function menage(): BelongsTo{
        return $this->belongsTo(Menage::class);
    }

    public function tarrif(): BelongsTo {
        return $this->belongsTo(Tariff::class);
    }
}
