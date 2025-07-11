<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_C',
        'annesco',
        'intitule',
        'description',
        'diplome'
    ];

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidature::class,'id_C');
    }
}
