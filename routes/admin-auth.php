<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PriceController;
use App\Http\Controllers\Admin\Auth\ServiceController;
use App\Http\Controllers\Admin\Auth\VehicleController;
use App\Http\Controllers\Admin\Auth\AppointmentController;
use App\Http\Controllers\DashboardController;

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


// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('t_vehicle', [DashboardController::class, 'totalVehicle'])->name('t_vehicle');

// });


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
    Route::get('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('fpassword', [AdminController::class, 'getForgetPassword'])->name('fpassword');

});


// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

// });

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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('add-service', [ServiceController::class, 'ListPrice'])->name('add-service');
    Route::post('post-service', [ServiceController::class, 'postService'])->name('post-service');
    Route::get('view-service', [ServiceController::class, 'viewService'])->name('view-service');
    Route::get('delete-service', [ServiceController::class, 'deleteService'])->name('delete-service');
    Route::delete('destroy-service/{id}', [ServiceController::class, 'destroyService'])->name('destroy-service');
    Route::post('update-service/{id}', [ServiceController::class, 'updateService'])->name('update-service');
    Route::get('updating-service', [ServiceController::class, 'updateServicing'])->name('updating-service');
    Route::get('edit-service/{id}', [ServiceController::class, 'editService'])->name('edit-servicing');


});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('view-appointment', [AppointmentController::class, 'viewAppointment'])->name('view-appointment');
    Route::get('edit-appointment',[AppointmentController::class,'editAppointment'])->name('edit-appointment');
    Route::get('editing-appointment/{id}',[AppointmentController::class,'editingAppointment'])->name('editing-appointment');
    Route::post('update-appointment/{id}',[AppointmentController::class,'updateAppointment'])->name('update-appointment');
    Route::get('approve-appointment', [AppointmentController::class, 'approveAppointment'])->name('approve-appointment');
    Route::get('reject-appointment', [AppointmentController::class, 'rejectedAppointment'])->name('reject-appointment');
    Route::get('complete-appointment', [AppointmentController::class, 'completedAppointment'])->name('complete-appointment');




});
