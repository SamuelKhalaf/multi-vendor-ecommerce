<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| front Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

