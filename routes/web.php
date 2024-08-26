<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminController::class, 'getLogin'])->name('adminLogin');
//     Route::post('/register', [AdminController::class, 'postLogin'])->name('adminLoginPost');

//     Route::group(['middleware' => 'adminauth'], function () {
//         Route::get('/', function () {
//             return view('welcome');
//         })->name('adminDashboard');

//     });
// });


require __DIR__. '/admin-auth.php';
