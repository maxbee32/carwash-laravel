<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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

        if($validator->validated()){


        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($validator->validated()));

        return redirect()->back()
                         ->with(['success' => 'Thank you for contacting us. We will get back to you shortly.']);
    }else{
        return back()->with('error', 'Failed to send message.');

    }

}


public function showVehicle( Request $request)
{


    $services = DB::table('services')
    ->leftJoin('prices', 'services.price_id', '=', 'prices.id')
    ->select('prices.description', 'prices.price', 'services.service')
    ->orderBy('prices.price')  // Order the results by price
    ->get()
    ->groupBy('description');

    // Fetch vehicle title and icon from the 'vehicles' table
    $vehicles = DB::table('vehicles')->select('title', 'icon', 'id')->get();

    // Check if vehicles are being retrieved
    if ($vehicles->isEmpty()) {
        return "No vehicles found in the database!";
    }

    // Pass the data to the 'book' view
    // return view('book', ['vehicles' => $vehicles]);
    return view('book' , compact('vehicles', 'services'));
}


// public function saveBooking(Request $request)
// {

//     // Get the existing session data and merge with the new request data
//     $data = array_merge($request->session()->get('booking_data', []), $request->all());
//     Log::info('Session Data:', $data);

//     // Check if session data exists, if not, redirect to the first step (session management)
//     if (empty($data)) {
//         return redirect()->route('/book')->with('error', 'Session expired, please start again.');
//     }

//     try {
//         // Step-specific validation based on the current step
//         // if ($request->has('next')) {
//             // if ($request->step == 1) {
//                 $request->validate([
//                     'vehicle' => 'required',
//                 ], ['vehicle.required' => 'Please select a vehicle.']);

//                 // Store vehicle selection in session
//                 $data['vehicle'] = $request->vehicle;
//             // } elseif ($request->step == 2) {
//                 $request->validate([
//                     'total_amount' => 'required',
//                 ], ['total_amount.required' => 'Please select a pricing plan.']);

//                 $data['total_amount'] = $request->total_amount;
//                 // $request->total_amount; // Store pricing plan in session
//             // } elseif ($request->step == 3) {
//                 $request->validate([
//                     'date' => 'required|date',
//                     'time' => 'required',
//                 ]);

//                 $data['date'] = $request->date; // Store date in session
//                 // Carbon::createFromFormat('H:i:s', $request->input('time'))->format('h:i A'),
//                 $data['time'] = $request->Carbon::createFromFormat('H:i:s', $request->time)->format('h:i A'); // Store time in session
//             // } elseif ($request->step == 4) {
//                 $request->validate([
//                     'name' => 'required',
//                     'email' => 'required|email',
//                     'phone_number' => 'required',
//                     'postcode' => 'required',
//                     'address' => 'required',
//                 ]);

//                 $data['name'] = $request->name; // Store first name in session
//                 $data['email'] = $request->email; // Store email in session
//                 $data['phone_number'] = $request->phonenumber; // Store phone number in session
//                 $data['postcode'] = $request->postcode; // Store postcode in session
//                 $data['address'] = $request->address; // Store address in session
//             // }

//             // Store current data in the session
//             $request->session()->put('booking_data', $data);
//             // Log::info('Session Data:', $request->session()->get('booking_data'));


//             // Move to the next step
//             return redirect()->back()->withInput()->with('step', $request->step + 1);
//         }

//         // Handle form submission when "Finish" button is clicked
//         if ($request->has('finish')) {
//             // Final validation before saving to the database
//             $request->validate([
//                 'vehicle' => 'required',
//                 'total_amount' => 'required',
//                 'date' => 'required|date',
//                 'time' => 'required',
//                 'name' => 'required',
//                 'email' => 'required|email',
//                 'phone_number' => 'required',
//                 'postcode' => 'required',
//                 'address' => 'required',
//             ], [
//                 'vehicle.required' => 'Please select a vehicle.',
//                 'total_amount.required' => 'Please select a pricing plan.',
//                 'date.required' => 'Please select a date.',
//                 'time.required' => 'Please select a time.',
//                 'name.required' => 'First name is required.',
//                 'email.required' => 'Email is required.',
//                 'phone_number.required' => 'Phone number is required.',
//                 'postcode.required' => 'Postcode is required.',
//                 'address.required' => 'Address is required.',
//             ]);

//             $booking = User::create($data);

//             // Send confirmation email (Example)
//             Mail::to($data['email'])->send(new BookingConfirmationMail($booking));

//             // Clear the session after the booking is completed
//             $request->session()->forget('booking_data');

//             // Redirect to payment page with success message
//             return redirect()->route('payment')->with('success', 'Proceed to making payment.');
//         }

//     } catch (\Exception $e) {
//         // Error handling: log the exception and return an error message
//         Log::error('Booking failed: ' . $e->getMessage());

//         // Return user to the same step with an error message
//         return redirect()->back()->withInput()->with('error', 'An error occurred while processing your booking. Please try again.');
//     }
// }


// }

public function saveBooking(Request $request)
{
    // Get the existing session data and merge with the new request data
    $data = array_merge($request->session()->get('booking_data', []), $request->all());
    Log::info('Session Data:', $data);

    // Check if session data exists, if not, redirect to the first step
    if (empty($data)) {
        return redirect()->route('/book')->with('error', 'Session expired, please start again.');
    }

    try {
        // Validate each step based on input
        $request->validate([
            'vehicle' => 'required',
            'total_amount' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'postcode' => 'required',
            'address' => 'required',
        ], [
            'vehicle.required' => 'Please select a vehicle.',
            'total_amount.required' => 'Please select a pricing plan.',
            'date.required' => 'Please select a date.',
            'time.required' => 'Please select a time.',
            'name.required' => 'First name is required.',
            'email.required' => 'Email is required.',
            'phone_number.required' => 'Phone number is required.',
            'postcode.required' => 'Postcode is required.',
            'address.required' => 'Address is required.',
        ]);

        // Store all validated data in the session
        $data['vehicle'] = $request->vehicle;
        $data['total_amount'] = $request->total_amount;
        $data['date'] = $request->date;
        $data['time'] = Carbon::createFromFormat('H:i', $request->time)->format('h:i A');
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['postcode'] = $request->postcode;
        $data['address'] = $request->address;

        // Store current data in session
        $request->session()->put('booking_data', $data);

        // Handle form submission when "Finish" button is clicked
        if ($request->has('finish')) {

        //     $Id =IdGenerator::generate(['table'=>'users','field'=>'ticket','length'=>10,'prefix'=>'REF-']);
        //     // Save the booking (example with a Booking model)
        //     $booking = User::create(array_merge(
        //         ['ticket'=>$Id],
        //         ['status'=> 'pending'],
        //         $data
        //     ));
        //    // create($data);

        //     // Send confirmation email (Example)
        //     Mail::to($data['email'])->send(new BookingConfirmationMail($booking));

            // Redirect to the payment page with a success message
            return redirect()->route('payment')->with('success', 'Proceed to making payment.');



        }

        // Move to the next step
        return redirect()->back()->withInput()->with('step', $request->step + 1);
        // Clear the session after the booking is completed
    //      $request->session()->forget('booking_data');

    } catch (\Exception $e) {
        // Error handling: log the exception and return an error message
        Log::error('Booking failed: ' . $e->getMessage());

        // Return user to the same step with an error message
        return redirect()->back()->withInput()->with('error', 'An error occurred while processing your booking. Please try again.');
    }
}


public function storeSessionData(Request $request) {
    // Store session data
    session([
        'booking_data.vehicle' => $request->vehicle,
        'booking_data.total_amount' => $request->total_amount,
        'booking_data.date' => $request->date,
        'booking_data.time' => $request->time,
        'booking_data.name' => $request->name,
        'booking_data.email' => $request->email,
        'booking_data.phone_number' => $request->phone_number,
        'booking_data.postcode' => $request->postcode,
        'booking_data.address' => $request->address,
    ]);

    // Return the stored data as JSON to update the UI
    return response()->json([
        'success' => true,
        'data' => [
            'vehicle' => $request->vehicle,
            'total_amount' => $request->total_amount,
            'date' => $request->date,
            'time' => $request->time,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'postcode' => $request->postcode,
            'address' => $request->address,
        ]
    ]);
}


public function saveBookingAfterPayment(Request $request)
{

    // dd($request->all());
     // Log current session data
     Log::info('Current session:', $request->session()->all());

    // Retrieve booking data from the session
    $bookingData = $request->session()->get('booking_data');

    // Log the booking data retrieval
    Log::info('Retrieved booking data:', $bookingData);

    if (!$bookingData) {
        return response()->json(['success' => false, 'message' => 'No booking data found.']);
    }

    // Check if the payment intent ID matches, if necessary
        // if ($request->payment_intent_id) {
        // Generate a unique ticket ID
        $Id = IdGenerator::generate(['table' => 'users', 'field' => 'ticket', 'length' => 10, 'prefix' => 'REF-']);

        // Save the booking data to the database
        $booking = User::create(array_merge(
            ['ticket' => $Id],
            ['status' => 'Pending'],  // Set the status to confirmed after successful payment
            // ['vehicle' => $bookingData['vehicle']],
            // ['total_amount' => $bookingData['total_amount']],
            // ['date' => $bookingData['date']],
            // ['time'=>$bookingData['time']],
            // ['name'=>$bookingData['name']],
            // ['email' =>$bookingData['email']],
            // ['phone_number'=>$bookingData['phone_number']],
            // ['postcode'=>$bookingData['postcode']],
            // ['address'=>$bookingData['address']],
             $bookingData
        ));

        // Send confirmation email (Example)
        Mail::to($booking['email'])->send(new BookingConfirmationMail($booking));

        // Clear the session data
        $request->session()->forget('booking_data');

        return response()->json(['success' => true, 'message' => 'Booking saved successfully.']);
    }

//     return response()->json(['success' => false, 'message' => 'Failed to save booking.']);
// }


}
