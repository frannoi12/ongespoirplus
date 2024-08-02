<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasOne;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        "etat",
        "role",
        "user_id"
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function politiques(): HasMany{
        return $this->hasMany(Politique::class);
    }

    public function signalements(): HasMany{
        return $this->hasMany(Signalement::class);
    }

    public function tournees(): HasMany{
        return $this->hasMany(Tournee::class);
    }

}
