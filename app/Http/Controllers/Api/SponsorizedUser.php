<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SponsorUser;
use App\User;
use App\SpecializationUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SponsorizedUser extends Controller
{
    public function getSponsorizedUsers(Request $request)
    {
        $sponsorsUsers = SponsorUser::all();
        $usersIds = [];
        foreach ($sponsorsUsers as $sponsorUser) {
            if ($sponsorUser->sponsor_id == 1) {
                $dt1 = Carbon::now();
                $dt2 = Carbon::createFromFormat("Y-m-d H:i:s", $sponsorUser->created_at);
                $dt2 = $dt2->addHours(24);
                if ($dt1->lte($dt2)) {
                    $usersIds[] = $sponsorUser->user_id;
                }
            } elseif ($sponsorUser->sponsor_id == 2) {
                $dt1 = Carbon::now();
                $dt2 = Carbon::createFromFormat("Y-m-d H:i:s", $sponsorUser->created_at);
                $dt2 = $dt2->addHours(72);
                if ($dt1->lte($dt2)) {
                    $usersIds[] = $sponsorUser->user_id;
                }
            } elseif ($sponsorUser->sponsor_id == 3) {
                $dt1 = Carbon::now();
                $dt2 = Carbon::createFromFormat("Y-m-d H:i:s", $sponsorUser->created_at);
                $dt2 = $dt2->addHours(144);
                if ($dt1->lte($dt2)) {
                    $usersIds[] = $sponsorUser->user_id;
                }
            }
        }
        $users = [];
        
        foreach ($usersIds as $userId) {
            $users[] = User::findOrFail($userId);
        }

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
