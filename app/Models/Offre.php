<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @mixin IdeHelperOffre
 */
class Offre extends Model
{
    use HasFactory;

    // Déclaration des attributs de la table "offres" que tu souhaites remplir
    protected $fillable = [
        'description', 
        'date_limit', 
        'entreprise', 
        'contrat', 
        'id_recru'
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
    public function candidatures(): HasMany
{
    return $this->hasMany(Candidature::class, 'id_offre');
}
}
