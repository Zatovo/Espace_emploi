<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCandidature
 */
class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cand',
        'cv',
        'description',
        'adresse',
        'niveau',
        'exp',
        'date_naiss',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_cand');
    }

    public function formation(): HasMany
    {
        return $this->hasMany(Formation::class);
    }

    public function exp_pro(): HasMany
    {
        return $this->hasMany(Exp_pro::class);
    }
}
