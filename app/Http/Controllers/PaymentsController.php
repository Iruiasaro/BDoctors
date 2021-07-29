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
     
        $status = Braintree\Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }
    public function payment()
    {
        $sponsorizations = Sponsor::all();
        $data = [
            'sponsorizations' => $sponsorizations,
        ];
        return view('admin.payment',$data);
    }
}
