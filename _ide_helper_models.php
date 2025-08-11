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
 * @mixin IdeHelperCandidature
 * @property int $id
 * @property int $id_cand
 * @property string $cv
 * @property string|null $description
 * @property string $adresse
 * @property string $niveau
 * @property string $exp
 * @property string $date_naiss
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Exp_pro> $exp_pro
 * @property-read int|null $exp_pro_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $formation
 * @property-read int|null $formation_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereDateNaiss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereIdCand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereNiveau($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereUpdatedAt($value)
 */
	class Candidature extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $id_C
 * @property string $debut
 * @property string $fin
 * @property string $poste
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidature $candidat
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereIdC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro wherePoste($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exp_pro whereUpdatedAt($value)
 */
	class Exp_pro extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $id_C
 * @property string $annesco
 * @property string $intitule
 * @property string|null $description
 * @property string $diplome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidature $candidat
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereAnnesco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDiplome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereIdC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereIntitule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereUpdatedAt($value)
 */
	class Formation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperOffre
 * @property int $id
 * @property int $id_recru
 * @property string $title_poste
 * @property string $entreprise
 * @property string $photo
 * @property string $description
 * @property string $localisation
 * @property string $contrat
 * @property int $exp
 * @property int $sale_limit_bas
 * @property int $sale_limit_haut
 * @property string $date_limit
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
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereIdRecru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereLocalisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereSaleLimitBas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereSaleLimitHaut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereTitlePoste($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereUpdatedAt($value)
 */
	class Offre extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperSession
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
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperUser
 * @property int $id
 * @property string $role
 * @property string $name
 * @property string $lastname
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $tel
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidature> $candidature
 * @property-read int|null $candidature_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offre> $offre
 * @property-read int|null $offre_count
 * @property-read \App\Models\Session|null $session
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

