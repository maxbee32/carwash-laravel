<?php

// namespace App\Http\Controllers;

// use Stripe\Stripe;
// use Stripe\PaymentIntent;
// use Illuminate\Http\Request;
// use Stripe\Exception\CardException;

// class CheckoutController extends Controller
// {

//     public function createPayment(Request $request)
//     {
//         // Set Stripe API Key
//         Stripe::setApiKey(config('services.stripe.secret'));

//         // Validate form input
//         $request->validate([
//             'holdername' => 'required|string',
//             'cardno'     => 'required|numeric|digits_between:13,19',
//             'exp'        => 'required|string|min:5|max:7', // MM/YYYY or MM/YY
//             'cvv'        => 'required|numeric|digits:3',
//         ]);

//         try {
//             // Create a PaymentIntent
//             $paymentIntent = PaymentIntent::create([
//                 'amount' =>  $request->total_amount * 100, // Amount in cents (1 GBP = 100 cents)
//                 'currency' => 'gbp',
//                 'payment_method_data' => [
//                     'type' => 'card',
//                     'card' => [
//                         'number' => $request->cardno,
//                         'exp_month' => substr($request->exp, 0, 2),
//                         'exp_year' => substr($request->exp, -4),
//                         'cvc' => $request->cvv,


//                     ],
//                 ],
//                 'description' => 'Payment for car wash',
//                 'confirm' => true,
//                 'automatic_payment_methods' => [
//                     'enabled' => true,
//                 ],
//                 'return_url' => route('payment.success') // The success route
//             ]);

//             // Payment was successful
//             return redirect()->back()->with('success', 'Payment was successful!');
//         } catch (CardException $e) {
//             // Payment failed
//             return redirect()->back()->with('error', 'Payment failed: ' . $e->getError()->message);
//         } catch (\Exception $e) {
//             // General error
//             return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
//         }
//     }
// }

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Stripe\PaymentIntent;
// use Stripe\Stripe;
// use Stripe\Exception\CardException;

// class CheckoutController extends Controller
// {
//     public function createPayment(Request $request)
//     {
//         // Set Stripe API Key
//         Stripe::setApiKey(config('services.stripe.secret'));

//         // Validate form input
//         $request->validate([
//             'holdername' => 'required|string',
//             'payment_method' => 'required|string', // Now we expect the payment method ID
//             // 'total_amount' => 'required|numeric', // Ensure total amount is validated
//         ]);

//         try {
//             // Create a PaymentIntent
//             $paymentIntent = PaymentIntent::create([
//                 'amount' => $request->total_amount * 100, // Amount in cents (1 GBP = 100 cents)
//                 'currency' => 'gbp',
//                 'payment_method' => $request->payment_method, // Use the payment method ID
//                 'description' => 'Payment for car wash',
//                 'confirm' => true,
//                 'automatic_payment_methods' => [
//                     'enabled' => true,
//                 ],
//                 'return_url' => route('payment.success'), // The success route
//             ]);

//             // Payment was successful
//             return redirect()->route('payment.success')->with('success', 'Payment was successful!');
//         } catch (CardException $e) {
//             // Payment failed
//             return redirect()->back()->with('error', 'Payment failed: ' . $e->getError()->message);
//         } catch (\Exception $e) {
//             // General error
//             return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
//         }
//     }


//     public function paymentSuccess()
//     {
//         return view('success-page'); // Create a success view for successful payments
//     }
// }



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(): View
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Payment for car wash"
        ]);

        return back()
                ->with('success', 'Payment successful!');
    }
}
