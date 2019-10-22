<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
	protected $fillable = [ 'url' ];

	public $incrementing = false;


	public function getShortUrl() {
		return env('APP_URL') . '/' . $this->id;
	}


	protected static function boot() {
		parent::boot();

		self::creating(function(self $url) {
			$source_to_id = join([
				time(),
				env("APP_KEY"),
				Str::slug($url)
			]);

			$long_id = md5($source_to_id);

			$url->setAttribute('id', mb_substr($long_id, 0, 10));

		});
	}
}
