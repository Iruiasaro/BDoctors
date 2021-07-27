<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviewsByUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $reviews = $user->reviews;
        
        $sum = 0;
        if (count($user->reviews) != 0) {
            foreach ($reviews as $review) {
                $sum = $sum + $review->vote;
            }
            $vote = $sum / count($reviews);
        }else{
            $vote = null;
        }

        $data = [
            'reviews' => $user->reviews,
            'vote' => $vote
        ];
        return response()->json([
            // "success" => false,
            "results" => $data
        ]);
    }
}
