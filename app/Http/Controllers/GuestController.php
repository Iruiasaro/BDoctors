<?php

namespace App\Http\Controllers;

use App\Message;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'doctors' => User::all(),
            'specializations' => Specialization::all()
        ];

        return view('welcome', $data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function payment()
    {
        return view('admin.payment');
    }
    public function sendMessage($id,Request $request)
    {
        $formData=$request->all();
        $user = User::findOrFail($id);
        $message= new Message();
        $message->sender_name = $formData['sender_name'];
        $message->content = $formData['content'];
        $message->user_id = $user->id;
        $user->messages()->save($message);
        $data = [
            'user' => $user,
        ];       
        
         return view('doctor.show', $data);
    }
}
