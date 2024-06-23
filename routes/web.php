<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/portfolio-details', function () {
    return view('portfolio-details');
});
Route::get('/service-details', function () {
    return view('service-details');
});
Route::get('/starter-page', function () {
    return view('starter-page');
});
