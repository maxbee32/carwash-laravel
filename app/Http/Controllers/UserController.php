<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

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

//   gacl xnxp dbok sjxq

    public function storeContact(Request $request):RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);


    // Check if validation fails
        if ($validator->stopOnFirstFailure()->fails()) {
        return back()->withErrors($validator)->withInput();
    }


        Contact::create($request->all());

        // dd($request->all());
        if($validator->validated()){


        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($validator->validated()));

        return redirect()->back()
                         ->with(['success' => 'Thank you for contacting us. We will get back to you shortly.']);
    }else{
        return back()->with('error', 'Failed to send message.');

    }

}
}
