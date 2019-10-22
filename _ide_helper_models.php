<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Url
 *
 * @property int $id
 * @property string $url
 * @property int $conversion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereConversion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereUrl($value)
 */
	class Url extends \Eloquent {}
}

