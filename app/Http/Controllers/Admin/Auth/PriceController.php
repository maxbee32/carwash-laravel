<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    public function addPrice()
    {
        return view('admin.auth.add-pricing');
    }


    public function postPrice(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [

            'description' => ['required', 'string', 'max:255','unique:prices'],
            'price' => ['required' ]
        ]);



        // Check if validation fails
        if ($validator->stopOnFirstFailure()->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the Price type
          Price::create([
            'description' => $request->input('description'),
            'price' => $request->input('price'),

        ]);

            if($validator->validated()){
                return redirect()->route('list-price')->with('success', "You've added new price successfully.");
            }else{
        return back()->with('error', 'Failed to add new price.');
            }
    }


    public function viewPrice(){

        // Fetch all vehicles from the database
         $prices = Price::all();

       // Return a view with the vehicles data
         return view('admin.auth.view-price', compact('prices'));

      }


      public function deletePrice()
    {
         $prices = Price::all();

        // Return a view with the vehicles data
          return view('admin.auth.delete-pricing' , compact('prices'));
    }


    public function destroyPrice($id) {
        $price = Price::where('id', $id)->firstorfail()->delete(); 
        if ($price) {
            // $price->delete();
            return redirect()->back()->with('success', 'Price deleted successfully!');
        }

        return redirect()->back()
                         ->with('error', 'Price not found!');
    }


    public function updatePricing()
    {
        $prices = Price::all();


        // Return a view with the vehicles data
          return view('admin.auth.update-pricing' , compact('prices'));
    }



     public function editPricing($id)
    {
        $editprices = Price::find($id);

        // Return a view with the vehicles data
          return view('admin.auth.edit-pricing' , compact('editprices'));
    }




    public function updatePrice(Request $request, $id) {
        // Find the vehicle by ID
        $price = Price::find($id);

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required' ]
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Update price details
        $price->description = $request->description;
        $price->price = $request->price;

        if($price->save()){
            return redirect()->route('list-price')->with('success', 'Price updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Price update unsuccessful!');
        }
    }

}
