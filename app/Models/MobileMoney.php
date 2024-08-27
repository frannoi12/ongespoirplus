<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MobileMoney extends Model
{
    use HasFactory;

    protected $table = 'mobile_moneys';

    protected $fillable = [
        'type_mobile_money',
        'paiement_id',
        'ref_transaction',
        'devise',
        'date_transaction',
    ];

    protected $casts = [
        'date_transaction' => 'datetime', // Assurer que la date soit traitée correctement
    ];

    public function paiement(): BelongsTo{
        return $this->belongsTo(Paiement::class);
    }
}
