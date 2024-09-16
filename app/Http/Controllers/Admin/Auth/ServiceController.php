<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Models\Price;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    public function ListPrice()
    {
        $prices = Price::all();

        // Return a view with the vehicles data
          return view('admin.auth.add-service', compact('prices'));
    }



    public function postService(Request $request)
    {

       // Validate the form data
    $validated = $request->validate([
        'price_id' => 'required|exists:prices,id',  // Ensure a valid price ID is selected
        'service' => 'required|array',             // Ensure 'service' is an array
        'service.*' => 'required|string|max:5000',  // Ensure each service in the array is a valid string
    ]);

    // Get the price_id from the form
    $priceId = $request->input('price_id');
    // Loop through each service in the array
    foreach ($request->service as $service) {
        // Save each service individually to the database
        Service::create([
            'price_id' => $priceId,   // Associate with the selected price
            'service' => $service,    // Save the service name
        ]);
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Services added successfully!');
}


public function viewService(){

    // Fetch all services with their associated price descriptions
    $services = DB::table('services')
    ->leftJoin('prices',  'services.price_id', '=', 'prices.id')
    ->orderBy('prices.description')
    ->get();


    // Service::with('price')->get();
    // dd($services);

   // Return a view with the vehicles data
     return view('admin.auth.view-service', compact('services'));

  }


  public function deleteService()
  {
        // Fetch all services with their associated price descriptions
        $services = DB::table('services')
        ->leftJoin('prices', 'services.price_id', '=', 'prices.id')
        ->orderBy('prices.description')
        ->select('services.id', 'services.service', 'prices.description')
        ->get();

      // Return a view with the vehicles data
        return view('admin.auth.delete-service' , compact('services'));
  }


  public function destroyService($id) {

// Check if the service exists
$service = DB::table('services')->where('id', $id)->first();

// dd($service);

if ($service) {
    // Delete the service if it exists
    DB::table('services')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'Service deleted successfully!');
}

// If no service is found, return a custom error message
return redirect()->back()->with('error', 'Service not found!');
}




public function updateServicing()
  {
        // Fetch all services with their associated price descriptions
        $services = DB::table('services')
        ->leftJoin('prices', 'services.price_id', '=', 'prices.id')
        ->orderBy('prices.description')
        ->select('services.id', 'services.service', 'prices.description')
        ->get();

      // Return a view with the vehicles data
        return view('admin.auth.update-service' , compact('services'));
  }



  public function editService($id)
  {
     // Fetch the specific service by ID with its associated price description
     $services = DB::table('services')
     ->where('services.id', $id)
     ->select('services.id', 'services.service', 'services.price_id') // Only select necessary fields
     ->first();  // Fetch the first result

    // Fetch all prices to populate the dropdown
    $prices = DB::table('prices')->select('id', 'description')->get();

      // Return a view with the vehicles data
    return view('admin.auth.edit-service' , compact('services', 'prices'));
  }


  public function updateService(Request $request, $id)
  {
      // Validate the request input
      $request->validate([
          'service' => 'required|string|max:255',
          'price_id' => 'required|exists:prices,id', // Ensure the price_id exists in the prices table
      ]);

      // Find the service by ID
      $service = Service::findOrFail($id);

      // Update the service with new values from the form
      $service->update([
          'service' => $request->input('service'), // Update the 'service' field
          'price_id' => $request->input('price_id'), // Update the 'price_id' (dropdown)
      ]);

      // Redirect back with a success message
      return redirect()->route('view-service')->with('success', 'Service updated successfully!');
  }


}
