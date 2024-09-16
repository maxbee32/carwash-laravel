<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showService()
  {
        // Fetch a limited set of services with their associated price descriptions
    $limitedServices = DB::table('services')
    ->leftJoin('prices', 'services.price_id', '=', 'prices.id')
    ->select('prices.description', 'prices.price', 'services.service')
    ->orderBy('prices.price')  // Order the results by price
    ->inRandomOrder()
    ->limit(6)  // Limit the results to 6 records
    ->get()
    ->groupBy('description');  // Group the data by price description

// Fetch all services with their associated price descriptions
    $services = DB::table('services')
    ->leftJoin('prices', 'services.price_id', '=', 'prices.id')
    ->select('prices.description', 'prices.price', 'services.service')
    ->orderBy('prices.price')  // Order the results by price
    ->get()
    ->groupBy('description');  // Group the data by price description
      // Return a view with the vehicles data
        return view('index' , compact('limitedServices','services'));
  }
}
