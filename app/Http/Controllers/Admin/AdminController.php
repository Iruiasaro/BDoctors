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
        $formData = $request->all();
        $user = User::findOrFail($id);


        if (key_exists('cv', $formData)) {
            $storageResult = Storage::put("cv", $formData["cv"]);
            $user->curriculum = $storageResult;
        }


        $request->validate(
            [

                "name" => 'max:50',
                "lastname" => 'max:50',
                "email" => "email:rfc,dns|max:255|",
                "specializations" => "required",
            ]
        );
        if (key_exists('image', $formData)) {
            $storageResult = Storage::put("images", $formData["image"]);
            $user->image = $storageResult;
        }
        foreach ($formData['specializations'] as $specializationId) {
               $user->specializations()->attach($specializationId);
        }
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
    public function charts($id){
        return view('admin.statistics');
    }
}
