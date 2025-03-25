<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_recru', 'date_limit', 'description', 'entreprise', 'contrat'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_recru');
    }
}

