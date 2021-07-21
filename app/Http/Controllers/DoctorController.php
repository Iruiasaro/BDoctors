<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        $data = [
            "user" => $user,
        ];

        return view('doctor.show', $data);
    }
}
