<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/book', function () {
    return view('book');
});
Route::get('/service-details', function () {
    return view('service-details');
});
Route::get('/starter-page', function () {
    return view('starter-page');
});
Route::get('/payment', function () {
    return view('payment');
});

Route::get('/', [UserController::class, 'showService'])->name('index');


require __DIR__. '/admin-auth.php';
