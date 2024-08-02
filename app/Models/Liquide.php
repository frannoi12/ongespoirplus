<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Liquide extends Model
{
    use HasFactory;

    public function paiement(): BelongsTo{
        return $this->belongsTo(Paiement::class);
    }
}
