<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $id_cand
 * @property string $cv
 * @property string $lm
 * @property string $adresse
 * @property string $niveau
 * @property string $exp
 * @property string $date_naiss
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereDateNaiss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereIdCand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereLm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereNiveau($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCandidature {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $id_recru
 * @property string $date_limit
 * @property string $description
 * @property string $entreprise
 * @property string $contrat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Offre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereContrat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereDateLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereEntreprise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereIdRecru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOffre {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id_session
 * @property int $id_user
 * @property string $ip_address
 * @property string $user_agent
 * @property string $last_activity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereIdSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserAgent($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSession {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $role
 * @property string $nom
 * @property string $prenom
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $tel
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

