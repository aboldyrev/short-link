<?php

namespace App\Http\Controllers;


use App\Models\Url;

class SiteController extends Controller
{
	public function index(string $urlId) {
		/** @var Url $url */
		$url = Url::findOrFail($urlId);

		$url->increment('conversion');

		return redirect($url->url);
	}
}