<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        "type_paiement",
        "tariff_id",
        "personnel_id",
        "menage_id",
    ];

    public function menage(): BelongsTo{
        return $this->belongsTo(Menage::class);
    }

    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function tariff(): BelongsTo {
        return $this->belongsTo(Tariff::class);
    }

    public function mobileMoney(): HasOne{
        return $this->hasOne(MobileMoney::class);
    }

    public function liquide(): HasOne{
        return $this->hasOne(Liquide::class);
    }
}
