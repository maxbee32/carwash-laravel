<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SumUpController extends Controller
{
    private $sumupBaseUrl;
    private $accessToken;

    public function __construct()
    {
        $this->sumupBaseUrl = 'https://api.sumup.com';
    }

    private function getAccessToken()
    {
        if (Cache::has('sumup_access_token')) {
            return Cache::get('sumup_access_token');
        }


        $response = Http::asForm()->post("{$this->sumupBaseUrl}/token", [
            'grant_type'    => 'client_credentials',
            'client_id'     => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'scope'         => 'payments',
        ]);

        if ($response->successful()) {
            $tokenData = $response->json();
            $accessToken = $tokenData['access_token'];
            $expiresIn = $tokenData['expires_in'];

            // Cache the token
            Cache::put('sumup_access_token', $accessToken, now()->addSeconds($expiresIn - 60));
            Log::info('Access Token: ' . $accessToken);

            return $accessToken;
        } else {
            throw new \Exception('Failed to obtain access token from SumUp.');
        }



    }

    public function createPayment(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'holdername' => 'required|string',
            'cardno'     => 'required|string|min:16|max:19',
            'exp'        => 'required|string|min:5|max:7',
            'cvv'        => 'required|string|min:3|max:4',
        ]);

        // Extract card details
        $cardDetails = [
            'card_number'  => str_replace(' ', '', $validated['cardno']),
            'expiry_month' => substr($validated['exp'], 0, 2),
            'expiry_year'  => substr($validated['exp'], 3, 4),
            'cvv'          => $validated['cvv'],
        ];

        // Get the access token
        $this->accessToken = $this->getAccessToken();

        // Create the checkout
        try {
            $response = Http::withToken($this->accessToken)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post("{$this->sumupBaseUrl}/v0.1/checkouts", [
                    'checkout_reference' => uniqid(),
                    'amount'             => $request->total_amount,
                    'currency'           => 'GBP',
                    'pay_to_email'       => env('MAIL_TO_ADDRESS'),
                    'description'        => 'Payment for car wash',
                    'card'               => $cardDetails,
                    // 'merchant_code'      => env('SUMUP_MERCHANT_CODE'), // Optional
                ]);

                if ($response->successful()) {
                    $responseBody = $response->json();
                    Log::info('SumUp Response: ' . json_encode($responseBody)); // Log the full response

                    if (isset($responseBody['status']) && $responseBody['status'] == 'PAID') {
                        return redirect()->back()->with('success', 'Payment successful! Thank you.');
                    } else {
                        Log::error('Payment Status: ' . json_encode($responseBody));
                        return redirect()->back()->with('error', 'Payment failed. Please try again.');
                    }
                } else {
                    Log::error('API Error: ' . $response->body()); // Log API error response
                    return redirect()->back()->with('error', 'Failed to process payment. Please try again.');
                }

        } catch (\Exception $e) {
            // Handle exceptions
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
