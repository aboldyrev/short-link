<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	protected $fillable = [ 'url' ];

	protected static function boot() {
		parent::boot();

		self::creating(function(self $url) {

			$long_id = md5(time() . env("APP_KEY"));

			$url->setAttribute('id', mb_substr($long_id, 0, 10));

		});
	}
}
