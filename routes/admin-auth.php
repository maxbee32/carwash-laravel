<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\VehicleController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PriceController;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', [AdminController::class, 'getLogin'])->name('adminLogin');
    Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/adminDashboard', function () {
            return view('admin.auth.dashboard');
        })->name('dashboard');

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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('delete-vehicle', [VehicleController::class, 'deleteVehicle'])->name('delete-vehicle');
    Route::get('add-vehicle', [VehicleController::class, 'addVehichle'])->name('add-vehicle');
    Route::post('post-vehicle', [VehicleController::class, 'postVehicle'])->name('post-vehicle');
    Route::get('list-vehicles', [VehicleController::class, 'viewVehicle'])->name('list-vehicle');
    Route::delete('destroy-vehicle/{id}', [VehicleController::class, 'destroyVehicle'])->name('destroy-vehicle');
    Route::post('update-vehicle/{id}', [VehicleController::class, 'updateVehicle'])->name('update-vehicle');
    Route::get('edit-vehicle', [VehicleController::class, 'editVehicle'])->name('edit-vehicle');
    Route::get('edit-car/{id}', [VehicleController::class, 'editCar'])->name('edit-car');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('add-price', [PriceController::class, 'addPrice'])->name('add-price');
    Route::post('post-price', [PriceController::class, 'postPrice'])->name('post-price');
    Route::get('list-price', [PriceController::class, 'viewPrice'])->name('list-price');
    Route::get('delete-price', [PriceController::class, 'deletePrice'])->name('delete-price');
    Route::delete('destroy-price/{id}', [PriceController::class, 'destroyPrice'])->name('destroy-price');
    Route::post('update-price/{id}', [PriceController::class, 'updatePrice'])->name('update-price');
    Route::get('updating-price', [PriceController::class, 'updatePricing'])->name('updating-price');
    Route::get('edit-pricing/{id}', [PriceController::class, 'editPricing'])->name('edit-pricing');

});

