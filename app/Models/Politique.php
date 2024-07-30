<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Politique extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "personnel_id",
    ];

    public function personnel(): BelongsTo{
        return $this->belongsTo(Personnel::class, 'personnel_id');
    }
}
