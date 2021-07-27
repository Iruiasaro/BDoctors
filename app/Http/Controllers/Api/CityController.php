<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(){
        $cities = City::all();
        $data = [
            $cities
        ];
        return response()->json([
            // "success" => false,
            "results" => $data
        ]);
    }
}
