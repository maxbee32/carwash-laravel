<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', [AdminController::class, 'getLogin'])->name('adminLogin');
    Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/adminDashboard', function () {
            return view('admin.auth.dashboard');
        })->name('adminDashboard');

    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('registration', [AdminController::class, 'getRegistration'])->name('register');
    Route::post('post-registration', [AdminController::class, 'postRegistration'])->name('register.post');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/adminDashboard', function () {
            return view('admin.auth.dashboard');
        })->name('adminDashboard');

    });
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('fpassword', [AdminController::class, 'getForgetPassword'])->name('fpassword');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');

});
// Route::prefix('admin')->middleware('guest:admin')->group(function () {

//     Route::get('register', [RegisterController::class, 'create'])->name('admin.register');
//     Route::post('register', [RegisterController::class, 'store']);

//     Route::get('login', [AdminController::class, 'getLogin'])->name('admin.login');
//     Route::post('login', [AdminController::class, 'postLogin']);

// });

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // Route::get('dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::post('logout', [AdminController::class, 'destroy'])->name('admin.logout');

});
