<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\User;
use Illuminate\Http\Request;
use Braintree;
use SponsorUser;

class PaymentsController extends Controller
{
    public function process(Request $request, $price_id)
    {
        $user = User::findOrFail(auth()->user()->id); 
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $price = Sponsor::where('id', $price_id)->first()->price;
        
        $status = Braintree\Transaction::sale([
            'amount' => $price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        if( !empty($status->transaction) ) {
            $user->sponsors()->sync($price_id, false);
        }
        return response()->json($status);
    }
    public function payment(Request $request, $price_id)
    {
        $sponsorizations = Sponsor::all();


        $data = [
            'price_id' => $price_id,
            'sponsorizations' => $sponsorizations,
        ];

        return view('admin.payment', $data);
    }
}
