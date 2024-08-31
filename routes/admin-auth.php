<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\VehicleController;
use App\Http\Controllers\Admin\Auth\AdminController;



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
    Route::get('delete-vehicle', [VehicleController::class, 'deleteVehichle'])->name('delete-vehicle');
    Route::get('add-vehicle', [VehicleController::class, 'addVehichle'])->name('add-vehicle');
    Route::post('post-vehicle', [VehicleController::class, 'postVehicle'])->name('post-vehicle');
    Route::get('list-vehicles', [VehicleController::class, 'viewVehicle'])->name('list-vehicle');
    Route::delete('destroy-vehicle/{id}', [VehicleController::class, 'destroyVehicle'])->name('destroy-vehicle');
    Route::post('update-vehicle/{id}', [VehicleController::class, 'updateVehicle'])->name('update-vehicle');
    Route::get('edit-vehicle', [VehicleController::class, 'editVehicle'])->name('edit-vehicle');
    Route::get('edit-car', [VehicleController::class, 'editCar'])->name('edit-car');

});

