<?php

Route::get('events', 'EventController@index');
Route::get('events/{event}', 'EventController@show');
Route::post('events', 'EventController@store');
Route::put('events/{event}', 'EventController@update');
Route::delete('events/{event}', 'EventController@delete');
