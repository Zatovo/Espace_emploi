<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperOffre
 */
class Offre extends Model
{
    use HasFactory;

    // Déclaration des attributs de la table "offres" que tu souhaites remplir
    protected $fillable = [
        'id_recru',
        'title_poste',
        'entreprise',
        'photo',
        'description',
        'localisation',
        'contrat',
        'exp',
        'sale_limit_bas',
        'sale_limit_haut',
        'date_limit'
    ];

    /**
     * Définir la relation entre une offre et un utilisateur (recruteur).
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_recru');
    }
}
