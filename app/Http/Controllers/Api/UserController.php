<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $users = User::all();
        foreach ($users as $user) {
            $reviews[] = $user->reviews;
            $user["reviews"] = $reviews;
        }
        $data = [
            'users' => $users,
        ];
        return response()->json([
            // "success" => false,
            "results" => $data
        ]);
    }
}
