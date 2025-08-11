<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperSession
 */
class Session extends Model
{
    use HasFactory;

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id_user');
    }
}
