<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\SpecializationUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function messages($id)
    {
        if (auth()->user()->id == $id) {
            $user = User::findOrFail($id);
            $data = [
                "messages" => $user->messages()->get()
            ];
            return view("admin.messages", $data);
        } else {
            abort('403', 'Azione non autorizzata');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->id == $id) {
            $data = [
                'user' => User::findOrFail($id)
            ];
            return view("admin.edit", $data);
        } else {
            abort('403', 'Azione non autorizzata');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $formData = $request->all();
        $request->validate(
            [

                "name" => 'max:50',
                "lastname" => 'max:50',
                "email" => "email:rfc,dns|max:255|",
            ]
        );
        if (key_exists('image', $formData)) {
            $storageResult = Storage::put("images", $formData["image"]);
            $user->image = $storageResult;
        }

        $user->specializations()->attach($request->specialization_id);

        $user->update($formData);


        return redirect()->route("doctor.show", $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route("welcome");
    }
}
