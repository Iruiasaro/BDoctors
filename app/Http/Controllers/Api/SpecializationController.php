<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialization;
use App\User;

class SpecializationController extends Controller
{
    public function index(){
        $specializations = Specialization::all();
        return response()->json([
            // "success" => false,
            "results" => $specializations
        ]);
    }
    public function getUserSpecializations(Request $request){
        $user = User::findOrFail($request->user_id);
        $specializations = $user->specializations;
        return response()->json([
            // "success" => false,
            "results" => $specializations
        ]);
    }
}
