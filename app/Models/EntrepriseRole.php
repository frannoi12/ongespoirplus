<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepriseRole extends Model
{
    use HasFactory;

    // Nom de la table si différent du pluriel du modèle (Laravel utilise généralement le pluriel par défaut)
    protected $table = 'entreprises_role';

    // Les champs pouvant être remplis (mass assignable)
    protected $fillable = [
        'name',
    ];

    // public
}
