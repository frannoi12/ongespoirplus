<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        "identite",
        "naissance",
        "permis"
    ];

    public function personnel(): HasOne{
        return $this->hasOne(Personnel::class);
    }

}
