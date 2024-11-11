<?php

namespace App\Http\Controllers;


use Exception;
use Stripe\Stripe;
use App\Models\User;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PaymentController extends Controller
{

    public function payment()
    {
        return view('payment');
    }



    public function success()
    {
        return view('success-page');
    }

    public function charge(Request $request)
    {

        // Replace with your secret key, found in your Stripe dashboard
        Stripe::setApiKey('sk_test_51Q7OyPRxmKe0UKBMzauaW2ogTSfUzZzyxu4ipxjNMBVbqlkx3ren2ZthklziphENHS91pURqu4q1u2xcEYuMrJEA00bTIXGLN7');


        $bookingData = $request->session()->get('booking_data');

        if (!$bookingData) {
            return back()->with('error', 'No booking data found in session. Please try again.');
        }



        // Calculate the amount in pence (or cents) based on the total_amount
        $amountInPence = intval($bookingData['total_amount']) * 100;

        header('Content-Type: application/json');

        try {


            $paymentIntent = PaymentIntent::create([
                'amount' => $amountInPence,
                'currency' => 'gbp', // Replace with your country's primary currency
                'description'=>'Payment for car wash',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                // Remove if you don't want to send automatic email receipts after successful payment
                "receipt_email" => $bookingData['email']
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);




        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

   
}

