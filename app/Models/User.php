<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'role', 'name', 'lastname', 'tel', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function candidature(): HasMany
    {
        return $this->hasMany(Candidature::class);
    }

    public function offre(): HasMany
    {
        return $this->hasMany(Offre::class);
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

}
