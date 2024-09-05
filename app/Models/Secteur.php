<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secteur extends Model
{
    use HasFactory;

    protected $fillable = [
        "nomSecteur",
        "personnel_id"
    ];

    public function tournees(): HasMany{
        return $this->hasMany(Tournee::class);
    }

    public function menages():HasMany{
        return $this->hasMany(Menage::class);
    }

    public function personnel(): BelongsTo {
        return $this->belongsTo(Personnel::class);
    }
}
