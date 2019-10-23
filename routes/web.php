<?php

Route::get('{urlId}', 'SiteController@index');


Route::get('/', 'UrlController@index')->name('site.index');

Route
	::prefix('urls')
	->group(function() {

		Route::post('/', 'UrlController@store')->name('site.urls.store');

		Route::put('{url}', 'UrlController@update')->name('site.urls.update');

		Route::delete('{url}', 'UrlController@delete')->name('site.urls.delete');

	});
