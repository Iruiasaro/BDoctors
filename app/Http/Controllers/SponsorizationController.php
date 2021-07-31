<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class SponsorizationController extends Controller
{
    public function payment(Request $request){
        $request->sponsorization;
        return view('admin.sponsorPlan');
    }
}
