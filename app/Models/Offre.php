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

        'description',
    {
        return $this->belongsTo(User::class, 'id_recru');
    }
}

