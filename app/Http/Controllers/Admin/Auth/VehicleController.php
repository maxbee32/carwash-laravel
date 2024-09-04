<?php
namespace App\Http\Controllers\Admin\Auth;
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class VehicleController extends Controller
{

    public function deleteVehicle()
    {
         $vehicles = Vehicle::all();

        // Return a view with the vehicles data
          return view('admin.auth.delete-vehicle' , compact('vehicles'));
    }


    public function addVehichle()
    {
        return view('admin.auth.add-vehicle');
    }



    public function postVehicle(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [

            'title' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);



        // Check if validation fails
        if ($validator->stopOnFirstFailure()->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        // Handle the file upload after successful validation
    $filePath = null;
    if ($request->hasFile('icon')) {
        $file = $request->file('icon');
        $filename = time() . '_' . $file->getClientOriginalName();
        // Store the file in the 'public/vehicle_icons' directory
        $filePath = $file->storeAs('public/vehicle_icons', $filename);
    }

        // Create the vehicle type
          Vehicle::create([
            'title' => $request->input('title'),
            'icon' => $filePath, // Save the file path, not the original input

        ]);

            if($validator->validated()){
                return redirect()->route('list-vehicle')->with('success', "You've added new vehicle type successfully.");
            }else{
        return back()->with('error', 'Failed to create vehicle type.');
            }
    }

      public function viewVehicle(){

        // Fetch all vehicles from the database
         $vehicles = Vehicle::all();

       // Return a view with the vehicles data
         return view('admin.auth.vehicle', compact('vehicles'));

      }

      public function destroyVehicle($id) {
        $vehicle = Vehicle::where('id', $id)->first();


        if ($vehicle) {
            $vehicle->delete();
            return redirect()->route('list-vehicle')->with('success', 'Vehicle deleted successfully!');
        }

        return redirect()->back()
                         ->with('error', 'Vehicle not found!');
    }



    public function editVehicle()
    {
         $vehicles = Vehicle::all();

        // Return a view with the vehicles data
          return view('admin.auth.update-vehicle' , compact('vehicles'));
    }



    public function editCar($id)
    {
         $editvehicles = Vehicle::find($id);

        // Return a view with the vehicles data
          return view('admin.auth.edit-vehicle' , compact('editvehicles'));
    }


    public function updateVehicle(Request $request, $id) {
        // Find the vehicle by ID
        $vehicle = Vehicle::find($id);

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Update vehicle details
        $vehicle->title = $request->title;

        // Check if a new icon was uploaded
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('public/vehicle_icons');
            $vehicle->icon = $iconPath;
        }

        if($vehicle->save()){
            return redirect()->route('list-vehicle')->with('success', 'Vehicle updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Vehicle update unsuccessful!');
        }
    }


}
