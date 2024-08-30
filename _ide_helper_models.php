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
 * @property string $identite
 * @property string $naissance
 * @property string|null $permis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Personnel|null $personnel
 * @method static \Database\Factories\AgentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereIdentite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent wherePermis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUpdatedAt($value)
 */
	class Agent extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $date_paiement
 * @property int $nbre_mois
 * @property int $montant
 * @property string $montant_lettre
 * @property string $objet
 * @property int $paiement_id
 * @property int $secteur_id
 * @property int $tariff_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Paiement $paiement
 * @method static \Database\Factories\LiquideFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereDatePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereMontantLettre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereNbreMois($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereObjet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide wherePaiementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereSecteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquide whereUpdatedAt($value)
 */
	class Liquide extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type_menage
 * @property bool $politique
 * @property string $code
 * @property array|null $localisation
 * @property string $date_abonnement
 * @property string $date_prise_effet
 * @property int $secteur_id
 * @property int $user_id
 * @property int $tariff_id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Paiement> $paiements
 * @property-read int|null $paiements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProposerVente> $proposerVentes
 * @property-read int|null $proposer_ventes_count
 * @property-read \App\Models\Secteur $secteur
 * @property-read \App\Models\Service $service
 * @property-read \App\Models\Tariff $tariff
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\MenageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Menage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereDateAbonnement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereDatePriseEffet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereLocalisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage wherePolitique($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereSecteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereTypeMenage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereUserId($value)
 */
	class Menage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type_mobile_money
 * @property int $paiement_id
 * @property string $ref_transaction
 * @property string $devise
 * @property \Illuminate\Support\Carbon $date_transaction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Paiement $paiement
 * @method static \Database\Factories\MobileMoneyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney query()
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereDateTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereDevise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney wherePaiementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereRefTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereTypeMobileMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileMoney whereUpdatedAt($value)
 */
	class MobileMoney extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type_ordure
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProposerVente> $proposerVentes
 * @property-read int|null $proposer_ventes_count
 * @method static \Database\Factories\OrdureFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure whereTypeOrdure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ordure whereUpdatedAt($value)
 */
	class Ordure extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type_paiement
 * @property int $tariff_id
 * @property int $personnel_id
 * @property int $menage_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Liquide|null $liquide
 * @property-read \App\Models\Menage $menage
 * @property-read \App\Models\MobileMoney|null $mobileMoney
 * @property-read \App\Models\Tariff $tariff
 * @method static \Database\Factories\PaiementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereMenageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereTypePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereUpdatedAt($value)
 */
	class Paiement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $lieu_de_provenance
 * @property string $etat
 * @property string $role
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Politique> $politiques
 * @property-read int|null $politiques_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Signalement> $signalements
 * @property-read int|null $signalements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tournee> $tournees
 * @property-read int|null $tournees_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PersonnelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereEtat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereLieuDeProvenance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereUserId($value)
 */
	class Personnel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property int $personnel_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Personnel $personnel
 * @method static \Database\Factories\PolitiqueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Politique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Politique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Politique query()
 * @method static \Illuminate\Database\Eloquent\Builder|Politique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politique whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politique wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politique whereUpdatedAt($value)
 */
	class Politique extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Menage|null $menage
 * @property-read \App\Models\Ordure|null $ordure
 * @method static \Database\Factories\ProposerVenteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProposerVente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposerVente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposerVente query()
 */
	class ProposerVente extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nomSecteur
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Menage> $menages
 * @property-read int|null $menages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tournee> $tournees
 * @property-read int|null $tournees_count
 * @method static \Database\Factories\SecteurFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereNomSecteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereUpdatedAt($value)
 */
	class Secteur extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $code_service
 * @property string $type_service
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Menage> $menages
 * @property-read int|null $menages_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCodeService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTypeService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $statut
 * @property string $localisationGps
 * @property string $ville
 * @property string $quartier
 * @property int $personnel_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Personnel $personnel
 * @method static \Database\Factories\SignalementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereLocalisationGps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signalement whereVille($value)
 */
	class Signalement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $designation
 * @property int $montant
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Menage> $menages
 * @property-read int|null $menages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Paiement> $paiements
 * @property-read int|null $paiements_count
 * @method static \Database\Factories\TariffFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereUpdatedAt($value)
 */
	class Tariff extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type_tourne
 * @property string $statut
 * @property string $date_jour
 * @property int $secteur_id
 * @property int $personnel_id
 * @property int $agent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Personnel $personnel
 * @property-read \App\Models\Secteur $secteur
 * @method static \Database\Factories\TourneeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereDateJour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereSecteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereTypeTourne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournee whereUpdatedAt($value)
 */
	class Tournee extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $prenom
 * @property string|null $email
 * @property string $contact
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Menage|null $menage
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Personnel|null $personnel
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

