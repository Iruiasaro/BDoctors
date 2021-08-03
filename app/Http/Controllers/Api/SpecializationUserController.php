<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SpecializationUser;
use App\User;

class SpecializationUserController extends Controller
{
    public function index(Request $request)
    {
        
        $user_ids = SpecializationUser::where("specialization_id", $request->specialization_id)->get("user_id");
        $users = User::findMany($user_ids);
        foreach ($users as $user) {

            $reviews = $user->reviews;
            $sum = 0;
            if (count($reviews) != 0) {
                foreach ($reviews as $review) {
                    $sum = $sum + $review->vote;
                }
                $vote = $sum / count($reviews);
            } else {
                $vote = null;
            }
            $user->voteAverage = $vote;


            $specializations = $user->specializations;
            $user->specializationsArray = $specializations;
            
            $city = $user->city->name;
            $user->cityName = $city;
        }


        return response()->json([
            // "success" => false,
            "results" => $users
        ]);
    }
}
