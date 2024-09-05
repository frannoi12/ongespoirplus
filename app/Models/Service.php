<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "code_service",
        "type_service",
        "personnel_id"
    ];

    public function menages(): HasMany
    {
        return $this->hasMany(Menage::class);
    }

    public function personnel(): BelongsTo {
        return $this->belongsTo(Personnel::class);
    }
}
