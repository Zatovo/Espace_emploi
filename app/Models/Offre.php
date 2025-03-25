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

    protected $fillable = [
        'id_recru',
        'date_limit',
        'description',
        'entreprise',
        'contrat',
    ];

    public function recruteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_recru');
    }
}
