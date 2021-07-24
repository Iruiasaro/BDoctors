<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SpecializationUser;
use App\User;

class SpecializationUserController extends Controller
{
    public function index(Request $request)
    {   
        $user_ids = SpecializationUser::where("specialization_id", $request->specialization_id)->get("user_id");
        foreach ($user_ids as $user_id) {
            $users[] = User::find($user_id);
        }

        return response()->json([
            // "success" => false,
            "results" => $users
        ]);
    }
}
