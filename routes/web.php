<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('main');
});

Route::get('/autocompletCityName/{s}', ['uses' => 'APIController@autocompletCityName']);
Route::get('/getWeather/{id}/{units}', ['uses' => 'APIController@getWeather']);

