<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SpecializationUser;

class SpecializationUserController extends Controller
{
    public function index()
    {
        $specialization_user = SpecializationUser::all();

        return response()->json([
            "success" => false,
            "results" => $specialization_user
        ]);
    }
}
