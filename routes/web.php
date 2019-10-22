<?php

Route::get('/', 'UrlController@index')->name('site.index');

Route::get('{urlId}', 'SiteController@index');

Route::post('urls', 'UrlController@store')->name('site.urls.store');
