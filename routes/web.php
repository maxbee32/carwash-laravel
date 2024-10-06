<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SumUpController;

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
// Route::get('/service-details', function () {
//     return view('service-details');
// });
// Route::get('/starter-page', function () {
//     return view('starter-page');
// });
Route::get('/payment', function () {
    return view('payment');
})->name('payment');


Route::get('/', [UserController::class, 'showService'])->name('index');
Route::post('contact-us', [UserController::class, 'storeContact'])->name('contact-us');
Route::get('book', [UserController::class, 'showVehicle'])->name('book');
Route::post('save-book', [UserController::class, 'saveBooking'])->name('save-book');
Route::get('session-data', function(Request $request){
dd(session()->all());
});
Route::post('/store-session-data', [UserController::class, 'storeSessionData'])->name('store-session-data');



Route::post('/sumup-createPayment', [SumUpController::class, 'createPayment'])->name('checkout.createPayment');
// Route::get('/sumup-checkout/success', [SumUpController::class, 'paymentSuccess'])->name('checkout.success');
// Route::post('/sumup-checkout/callback', [SumUpController::class, 'paymentCallback'])->name('checkout.callback');

require __DIR__. '/admin-auth.php';
