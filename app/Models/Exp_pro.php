<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exp_pro extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_C',
        'debut',
        'fin',
        'poste',
        'description'
    ];

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidature::class,'id_C');
    }
}
