<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperCandidature
 */
class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cand',
        'id_offre',
        'cv',
        'lm',
        'adresse',
        'niveau',
        'exp',
        'date_naiss',
    ];

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_cand');
    }

    public function offre(): BelongsTo
    {
        return $this->belongsTo(Offre::class, 'id_offre');
    }
}
