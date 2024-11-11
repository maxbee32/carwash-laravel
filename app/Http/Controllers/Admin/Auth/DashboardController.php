<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //total vehicle
    // public function totalVehicle()
    // {
    //     // Count total vehicles based on the 'ticket' column
    //     $total_vehicle = User::whereNotNull('ticket')->count();

    //     // Return the count or pass it to a view if needed
    //     return view('admin.auth.dashboard', compact('total_vehicle'));

    // }
}
