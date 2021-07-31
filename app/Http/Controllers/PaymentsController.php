<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Braintree;

class PaymentsController extends Controller
{
    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $price  = $request->input('price');

        $status = Braintree\Transaction::sale([
            'amount' => $price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }
    public function payment(Request $request)
    {
        $sponsorizations = Sponsor::all();
        $price = $request->input('price');

        $data = [
            'price' => $price,
            'sponsorizations' => $sponsorizations,
        ];
        return view('admin.payment',$data);
    }
}
