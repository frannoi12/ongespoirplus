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
        'devise',
        'nbre_mois',
        'montant',
        'montant_lettre',
        'objet',
        'date_transaction',
        'paiement_id',
        'secteur_id',
        'tariff_id',
    ];

    protected $casts = [
        'date_transaction' => 'datetime', // Assurer que la date soit traitée correctement
    ];

    public function paiement(): BelongsTo{
        return $this->belongsTo(Paiement::class);
    }
}
