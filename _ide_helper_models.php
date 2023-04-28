<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 */
	class Model extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NormanHuthFontAwesomeField
 *
 * @property int $id
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField query()
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthFontAwesomeField whereUpdatedAt($value)
 */
	class NormanHuthFontAwesomeField extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NormanHuthPrismJs
 *
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs query()
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NormanHuthPrismJs whereUpdatedAt($value)
 */
	class NormanHuthPrismJs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NovaRadioFieldRadio
 *
 * @property int $id
 * @property string $select
 * @property string $select2
 * @property string $select3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio query()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio whereSelect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio whereSelect2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio whereSelect3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaRadioFieldRadio whereUpdatedAt($value)
 */
	class NovaRadioFieldRadio extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seeder
 *
 * @property int $id
 * @property string $seeder
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Seeder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seeder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seeder query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seeder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seeder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seeder whereSeeder($value)
 */
	class Seeder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

